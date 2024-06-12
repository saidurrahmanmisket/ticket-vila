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
            'title_en' => 'required|string',
            'title_de' => 'required|string',
            'title_hu' => 'required|string',
            'description_en' => 'required|string',
            'description_de' => 'required|string',
            'description_hu' => 'required|string',
            'button_type' => 'required|string',
            'image'=> 'required_if:thumbnail_type,image|image|mimes:jpeg,png,jpg,gif,svg|max:4096|nullable',
            'icon'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon_top_text_en'=> 'required_with:icon_top_text_de,icon_top_text_hu|string|nullable',
            'icon_top_text_de'=> 'required_with:icon_top_text_en,icon_top_text_hu|string|nullable',
            'icon_top_text_hu'=> 'required_with:icon_top_text_en,icon_top_text_de|string|nullable',
            'icon_bottom_text_en'=> 'required_with:icon_bottom_text_hu,icon_bottom_text_de|string|nullable',
            'icon_bottom_text_de'=> 'required_with:icon_bottom_text_en,icon_bottom_text_hu|string|nullable',
            'icon_bottom_text_hu'=> 'required_with:icon_bottom_text_en,icon_bottom_text_de|string|nullable',
            'thumbnail_type' => 'required|string|in:image,video',
            'video_url_en'=> 'required_if:thumbnail_type,video|string|url|nullable',
            'video_url_de'=> 'required_if:thumbnail_type,video|string|url|nullable',
            'video_url_hu'=> 'required_if:thumbnail_type,video|string|url|nullable',
        ]);

        if ($request->hasFile('image') && $request->thumbnail_type == 'image') {
            $image_path = Helper::fileUpload($request->file('image'),'the-process',time().'_'.Str::uuid());
        }else{
            $image_path = null;
        }
        if ($request->hasFile('icon')) {
            $icon_path = Helper::fileUpload($request->file('icon'),'the-process-icon',time().'_'.Str::uuid());
        }else{
            $icon_path = null;
        }

        $lastOrderItem = TheProcess::orderBy('sort_id','desc')->first();

        $theProcess = new TheProcess();
        $theProcess->title_en = $request->title_en;
        $theProcess->title_de = $request->title_de;
        $theProcess->title_hu = $request->title_hu;
        $theProcess->description_en = $request->description_en;
        $theProcess->description_de = $request->description_de;
        $theProcess->description_hu = $request->description_hu;
        $theProcess->button_type  = $request->button_type;
        $theProcess->image = $image_path;
        $theProcess->icon = $icon_path;
        $theProcess->sort_id = !empty($lastOrderItem) ? $lastOrderItem->sort_id + 1 : 0;
        $theProcess->icon_top_text_en = $request->icon_top_text_en;
        $theProcess->icon_top_text_de = $request->icon_top_text_de;
        $theProcess->icon_top_text_hu = $request->icon_top_text_hu;
        $theProcess->icon_bottom_text_en = $request->icon_bottom_text_en;
        $theProcess->icon_bottom_text_de = $request->icon_bottom_text_de;
        $theProcess->icon_bottom_text_hu = $request->icon_bottom_text_hu;
        if ($request->thumbnail_type == 'video') {
            $theProcess->video_url_en = $request->video_url_en;
            $theProcess->video_url_de = $request->video_url_de;
            $theProcess->video_url_hu = $request->video_url_hu;
        }
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
            'title_en' => 'required|string',
            'title_de' => 'required|string',
            'title_hu' => 'required|string',
            'description_en' => 'required|string',
            'description_de' => 'required|string',
            'description_hu' => 'required|string',
            'button_type' => 'required|string',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|nullable',
            'icon'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon_top_text_en'=> 'required_with:icon_top_text_de,icon_top_text_hu|string|nullable',
            'icon_top_text_de'=> 'required_with:icon_top_text_en,icon_top_text_hu|string|nullable',
            'icon_top_text_hu'=> 'required_with:icon_top_text_en,icon_top_text_de|string|nullable',
            'icon_bottom_text_en'=> 'required_with:icon_bottom_text_hu,icon_bottom_text_de|string|nullable',
            'icon_bottom_text_de'=> 'required_with:icon_bottom_text_en,icon_bottom_text_hu|string|nullable',
            'icon_bottom_text_hu'=> 'required_with:icon_bottom_text_en,icon_bottom_text_de|string|nullable',
            'thumbnail_type' => 'required|string|in:image,video',
            'video_url_en'=> 'required_if:thumbnail_type,video|string|url|nullable',
            'video_url_de'=> 'required_if:thumbnail_type,video|string|url|nullable',
            'video_url_hu'=> 'required_if:thumbnail_type,video|string|url|nullable',
        ]);
        $theProcess = TheProcess::findOrFail($id);
        if ($request->thumbnail_type == 'image') {
            if ($request->hasFile('image')) {
                $image_path = Helper::fileUpload($request->file('image'),'the-process',time().'_'.Str::uuid());
                Helper::deleteFile(public_path($theProcess->image));
            }else{
                $image_path = $theProcess->image;
            }
            $theProcess->video_url_en = null;
            $theProcess->video_url_de = null;
            $theProcess->video_url_hu = null;
        }else{
            $image_path = null;
            $theProcess->video_url_en = $request->video_url_en;
            $theProcess->video_url_de = $request->video_url_de;
            $theProcess->video_url_hu = $request->video_url_hu;
        }

        if ($request->hasFile('icon')) {
            $icon_path = Helper::fileUpload($request->file('icon'),'the-process-icon',time().'_'.Str::uuid());
            Helper::deleteFile(public_path($theProcess->icon));
        }else{
            $icon_path = $theProcess->icon;
        }

        $theProcess->title_en = $request->title_en;
        $theProcess->title_de = $request->title_de;
        $theProcess->title_hu = $request->title_hu;
        $theProcess->description_en = $request->description_en;
        $theProcess->description_de = $request->description_de;
        $theProcess->description_hu = $request->description_hu;
        $theProcess->button_type  = $request->button_type;
        $theProcess->image = $image_path;
        $theProcess->icon = $icon_path;
        $theProcess->icon_top_text_en = $request->icon_top_text_en;
        $theProcess->icon_top_text_de = $request->icon_top_text_de;
        $theProcess->icon_top_text_hu = $request->icon_top_text_hu;
        $theProcess->icon_bottom_text_en = $request->icon_bottom_text_en;
        $theProcess->icon_bottom_text_de = $request->icon_bottom_text_de;
        $theProcess->icon_bottom_text_hu = $request->icon_bottom_text_hu;
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
