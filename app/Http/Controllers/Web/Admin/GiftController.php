<?php

namespace App\Http\Controllers\Web\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Gift;
use App\Models\GiftFeaturedItem;
use App\Models\GiftGallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gifts = Gift::paginate(20);
        return view('admin.layouts.gift.index', compact('gifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.gift.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $validator = $request->validate([
            'name' => 'required|integer',
            'video_inside' => 'nullable|string',
            'video_outside' => 'nullable|string',
            'feature_title.*' => 'nullable|string',
            'feature_sub_title.*' => 'nullable|string',
            'gift_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gift_thum_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'inside_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'outside_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'plan_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'feature_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {

            // Store data in the 'gifts' table
            if ($request->has('gift_image')) {
                $file = $request->file('gift_image');
                $gift_image_path = Helper::fileUpload($file, 'gifts', time() . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            } else {
                $gift_image_path = null;
            }
            if ($request->hasFile('gift_thum_image')) {
                $file = $request->file('gift_thum_image');
                $gift_thum_image_path = Helper::fileUpload($file, 'gifts', time() . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            } else {
                $gift_thum_image_path = null;
            }
            $gift = new Gift();
            $gift->name = $request->name;
            $gift->video_link_inside = $request->video_inside;
            $gift->video_link_outside = $request->video_outside;
            $gift->image = $gift_image_path;
            $gift->thumbnail_image = $gift_thum_image_path;
            $gift->save();

            // Store gallery images in the 'gift_galleries' table
            if ($request->hasFile('inside_image')) {
                foreach ($request->file('inside_image') as $file) {
                    $image_path = Helper::fileUpload($file, 'gifts/inside-image', time() . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                    $gallery = new GiftGallary();
                    $gallery->gift_image_type = 'inside';
                    $gallery->image = $image_path;
                    $gallery->gift_id = $gift->id;
                    $gallery->save();
                }
            }

            // Store gallery images in the 'gift_galleries' table
            if ($request->hasFile('outside_image')) {
                foreach ($request->file('outside_image') as $file) {
                    $image_path = Helper::fileUpload($file, 'gifts/outside-image', time() . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                    $gallery = new GiftGallary();
                    $gallery->gift_image_type = 'outside';
                    $gallery->image = $image_path;
                    $gallery->gift_id = $gift->id;
                    $gallery->save();
                }
            }
            // Store gallery images in the 'gift_galleries' table
            if ($request->hasFile('plan_image')) {
                foreach ($request->file('plan_image') as $file) {
                    $image_path = Helper::fileUpload($file, 'gifts/plan-image', time() . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                    $gallery = new GiftGallary();
                    $gallery->gift_image_type = 'plan';
                    $gallery->image = $image_path;
                    $gallery->gift_id = $gift->id;
                    $gallery->save();
                }
            }

            // Store featured items in the 'gift_featured_items' table
            if ($request->has('feature_title')) {
                foreach ($request->input('feature_title') as $key => $title) {
                    if ($request->hasFile('feature_image')) {
                        $image_path = Helper::fileUpload($request->file('feature_image.' . $key), 'gifts/feature-image', time() . '_' . pathinfo($request->file('feature_image.' . $key)->getClientOriginalName(), PATHINFO_FILENAME));
                    } else {
                        $image_path = null;
                    }
                    $featuredItem = new GiftFeaturedItem();
                    $featuredItem->title = $title;
                    $featuredItem->sub_title = $request->input('feature_sub_title.' . $key);
                    $featuredItem->image = $image_path;
                    $featuredItem->gift_id = $gift->id;
                    $featuredItem->save();
                }
            }

            flash()->addSuccess("Gift Created Successfully.");

            DB::commit();
            return redirect()->route('admin.gift.index');

        } catch (\Exception $e) {
            // Handle the exception
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gift = Gift::findOrFail($id);

        return view('admin.layouts.gift.edit', compact('gift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
            [
                'image.max' => 'Maximum upload file size 2MB',
            ]
        );

        $gift = Gift::findOrFail($id);
        $file = $request->file('image');
        if ($file) {
            $image_path = Helper::fileUpload($file, '/gifts/', time() . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            Helper::deleteFile(public_path($gift->image));
        } else {
            $image_path = $gift->image;
        }

        $gift->update([
            'name' => $request->name,
            'image' => $image_path,
        ]);

        flash()->addSuccess("Gift Updated Successfully.");

        return redirect()->route('admin.gift.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gift = Gift::findOrFail($id);
        Helper::deleteFile(public_path($gift->image));
        $gift->delete();

        flash()->addSuccess("Gift Deleted Successfully.");
        return redirect()->route('admin.gift.index');
    }
}
