<?php

namespace App\Http\Controllers\Web\Admin\CMS;

use App\Enums\Section;
use App\Enums\Status;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero_sections = CMS::paginate(20);
        return view('admin.layouts.cms.hero-section.index',compact('hero_sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.cms.hero-section.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'page' => 'required|string',
           'title'=> 'required|string',
           'description'=> 'required|string',
           'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        //Check section already exist
        if (CMS::where('page',$request->page)->where('section_name',Section::HERO)->exists()) {
             flash()->addWarning('Section already exists');
             return redirect()->back()->withInput($request->all());
        }

        if ($request->hasFile('image')) {
           $image_path = Helper::fileUpload($request->file('image'),'hero-section',time().'_'.Str::uuid());
        }else{
            $image_path = null;
        }


        $hero_section = new CMS();
        $hero_section->title = $request->title;
        $hero_section->section_name = Section::HERO;
        $hero_section->description = $request->description;
        $hero_section->image = $image_path;
        $hero_section->page = $request->page;
        $hero_section->save();

        flash()->addSuccess('Hero Section Added Successfully');
        return redirect()->route('admin.cms-hero.index');
    }


    public function status($id)
    {
          $hero_section = CMS::findOrFail($id);
          if ($hero_section->status == Status::ACTIVE) {
              $hero_section->status = Status::INACTIVE;
          }else{
              $hero_section->status = Status::ACTIVE;
          }
          $hero_section->save();
          return response()->json([
              'success' => true,
              'message' => 'Hero Section Status Changed Successfully',
              'data' => $hero_section,
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hero_section = CMS::findOrFail($id);
        return view('admin.layouts.cms.hero-section.edit',compact('hero_section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=> 'required|string',
            'description'=> 'required|string',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'page' => 'required|string'
        ]);

        //Check section already exist
        if (CMS::where('id','!=',$id)->where('page',$request->page)->where('section_name',Section::HERO)->exists()) {
            flash()->addWarning('Section already exists');
            return redirect()->back();
        }
        $hero_section = CMS::findOrFail($id);
        if ($request->hasFile('image')) {
            $image_path = Helper::fileUpload($request->file('image'),'hero-section',time().'_'.Str::uuid());
            Helper::deleteFile(public_path($hero_section->image));
        }else{
            $image_path = $hero_section->image;
        }


        $hero_section->title = $request->title;
        $hero_section->description = $request->description;
        $hero_section->image = $image_path;
        $hero_section->page = $request->page;
        $hero_section->save();

        flash()->addSuccess('Hero Section Updated Successfully');
        return redirect()->route('admin.cms-hero.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $hero_section = CMS::findOrFail($id);
        Helper::deleteFile(public_path($hero_section->image));
        $hero_section->delete();

        flash()->addSuccess("Hero Section Deleted Successfully.");
        return redirect()->route('admin.cms-hero.index');
    }
}
