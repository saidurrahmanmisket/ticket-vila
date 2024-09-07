<?php

namespace App\Http\Controllers\Web\Admin\CMS;

use App\Enums\Section;
use App\Enums\Status;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //permission check
        if (! has_permission('cms menu')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $hero_sections = CMS::when($request->search, function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->where('title_en', 'like', '%'.$value.'%')->orWhere('page', 'like', '%'.str_replace(' ', '_', $value).'%');
            });
        })->paginate(20);

        return view('admin.layouts.cms.hero-section.index', compact('hero_sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //permission check
        if (! has_permission('cms create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        return view('admin.layouts.cms.hero-section.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //permission check
        if (! has_permission('cms create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $request->validate([
            'page' => 'required|string',
            'title_en' => 'required|string',
            'title_de' => 'required|string',
            'title_hu' => 'required|string',
            'description_en' => 'required|string',
            'description_de' => 'required|string',
            'description_hu' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        //Check section already exist
        if (CMS::where('page', $request->page)->where('section_name', Section::HERO)->exists()) {
            flash()->addWarning('Section already exists');

            return redirect()->back()->withInput($request->all());
        }

        if ($request->hasFile('image')) {
            $image_path = Helper::fileUpload($request->file('image'), 'hero-section', time().'_'.Str::uuid());
        } else {
            $image_path = null;
        }

        $hero_section = new CMS();
        $hero_section->title_en = $request->title_en;
        $hero_section->title_de = $request->title_de;
        $hero_section->title_hu = $request->title_hu;
        $hero_section->section_name = Section::HERO;
        $hero_section->description_en = $request->description_en;
        $hero_section->description_de = $request->description_de;
        $hero_section->description_hu = $request->description_hu;
        $hero_section->image = $image_path;
        $hero_section->page = $request->page;
        $hero_section->save();

        flash()->addSuccess('Hero Section Added Successfully');

        return redirect()->route('admin.cms.hero.index');
    }

    public function status($id)
    {
        //permission check
        if (! has_permission('cms status')) {
            return response()->json([
                'success' => false,
                'message' => 'Permission denied: You do not have permission access this page',
            ]);
        }
        $hero_section = CMS::findOrFail($id);
        if ($hero_section->status == Status::ACTIVE) {
            $hero_section->status = Status::INACTIVE;
        } else {
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
        //permission check
        if (! has_permission('cms edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $hero_section = CMS::findOrFail($id);

        return view('admin.layouts.cms.hero-section.edit', compact('hero_section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //permission check
        if (! has_permission('cms edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $request->validate([
            'title_en' => 'required|string',
            'title_de' => 'required|string',
            'title_hu' => 'required|string',
            'description_en' => 'required|string',
            'description_de' => 'required|string',
            'description_hu' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'page' => 'required|string',
        ]);

        //Check section already exist
        if (CMS::where('id', '!=', $id)->where('page', $request->page)->where('section_name', Section::HERO)->exists()) {
            flash()->addWarning('Section already exists');

            return redirect()->back();
        }
        $hero_section = CMS::findOrFail($id);
        if ($request->hasFile('image')) {
            $image_path = Helper::fileUpload($request->file('image'), 'hero-section', time().'_'.Str::uuid());
            Helper::deleteFile(public_path($hero_section->image));
        } else {
            $image_path = $hero_section->image;
        }

        $hero_section->title_en = $request->title_en;
        $hero_section->title_de = $request->title_de;
        $hero_section->title_hu = $request->title_hu;
        $hero_section->description_en = $request->description_en;
        $hero_section->description_de = $request->description_de;
        $hero_section->description_hu = $request->description_hu;
        $hero_section->image = $image_path;
        $hero_section->page = $request->page;
        $hero_section->save();

        flash()->addSuccess('Hero Section Updated Successfully');

        return redirect()->route('admin.cms.hero.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //permission check
        if (! has_permission('cms delete')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $hero_section = CMS::findOrFail($id);
        Helper::deleteFile(public_path($hero_section->image));
        $hero_section->delete();

        flash()->addSuccess('Hero Section Deleted Successfully.');

        return redirect()->route('admin.cms.hero.index');
    }
}
