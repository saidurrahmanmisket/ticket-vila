<?php

namespace App\Http\Controllers\Web\Admin\CMS;

use App\Enums\Status;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use App\Models\TheProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TheProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theProcess = TheProcess::orderBy('sort_id','asc')->paginate(20);
        return view('admin.layouts.cms.the-process.index',compact('theProcess'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.cms.the-process.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'button_type' => 'required|string',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'icon'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon_top_text'=> 'nullable|string',
            'icon_bottom_text'=> 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $image_path = Helper::fileUpload($request->file('image'),'the-process',time().'_'.Str::uuid());
        }else{
            $image_path = null;
        }
        if ($request->hasFile('icon')) {
            $icon_path = Helper::fileUpload($request->file('icon'),'the-process-icon',time().'_'.Str::uuid());
        }else{
            $icon_path = null;
        }

        $theProcess = new TheProcess();
        $theProcess->title = $request->title;
        $theProcess->description = $request->description;
        $theProcess->button_type  = $request->button_type;
        $theProcess->image = $image_path;
        $theProcess->icon = $icon_path;
        $theProcess->icon_top_text = $request->icon_top_text;
        $theProcess->icon_bottom_text = $request->icon_bottom_text;
        $theProcess->save();

        flash()->addSuccess("The process has been created");

        return redirect()->route('admin.cms.the-process.index');
    }

    public function status(string $id)
    {
        $theProcess = TheProcess::findOrFail($id);
        if ($theProcess->status == Status::ACTIVE) {
            $theProcess->status = Status::INACTIVE;
        }else{
            $theProcess->status = Status::ACTIVE;
        }
        $theProcess->save();
        $theProcess = TheProcess::orderBy('sort_id','asc')->paginate(20);
        return view('admin.layouts.cms.the-process.list',compact('theProcess'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $theProcess = TheProcess::findOrFail($id);
        return view('admin.layouts.cms.the-process.edit',compact('theProcess'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'button_type' => 'required|string',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'icon'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon_top_text'=> 'nullable|string',
            'icon_bottom_text'=> 'nullable|string',
        ]);
        $theProcess = TheProcess::findOrFail($id);
        if ($request->hasFile('image')) {
            $image_path = Helper::fileUpload($request->file('image'),'the-process',time().'_'.Str::uuid());
            Helper::deleteFile(public_path($theProcess->image));
        }else{
            $image_path = $theProcess->image;
        }
        if ($request->hasFile('icon')) {
            $icon_path = Helper::fileUpload($request->file('icon'),'the-process-icon',time().'_'.Str::uuid());
            Helper::deleteFile(public_path($theProcess->icon));
        }else{
            $icon_path = $theProcess->icon;
        }

        $theProcess->title = $request->title;
        $theProcess->description = $request->description;
        $theProcess->button_type  = $request->button_type;
        $theProcess->image = $image_path;
        $theProcess->icon = $icon_path;
        $theProcess->icon_top_text = $request->icon_top_text;
        $theProcess->icon_bottom_text = $request->icon_bottom_text;
        $theProcess->save();

        flash()->addSuccess("The process has been updated");

        return redirect()->route('admin.cms.the-process.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $theProcess = TheProcess::findOrFail($id);
        Helper::deleteFile(public_path($theProcess->image));
        Helper::deleteFile(public_path($theProcess->icon));
        $theProcess->delete();

        flash()->addSuccess("The Process Deleted Successfully.");
        return redirect()->route('admin.cms.the-process.index');
    }

    public function orderUpdate(Request $request)
    {


        if ($request->has('ids')) {
            $arr = explode(',', $request->input('ids'));

            foreach ($arr as $sortOrder => $id) {
                $theProcess = TheProcess::findOrFail($id);
                $theProcess->sort_id = $sortOrder;
                $theProcess->save();
            }
            $theProcess = TheProcess::orderBy('sort_id','asc')->paginate(20);
            return view('admin.layouts.cms.the-process.list',compact('theProcess'));
        }
    }
}
