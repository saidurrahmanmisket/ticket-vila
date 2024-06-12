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
            'name_en' => 'required|string',
            'name_de' => 'required|string',
            'name_hu' => 'required|string',
            'video_inside' => 'nullable|string',
            'video_outside' => 'nullable|string',
            'feature_title_en.*' => 'required',
            'feature_title_de.*' => 'required',
            'feature_title_hu.*' => 'required',
            'feature_sub_title_en.*' => 'nullable|string',
            'feature_sub_title_de.*' => 'nullable|string',
            'feature_sub_title_hu.*' => 'nullable|string',
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
            $gift->name_en = $request->name_en;
            $gift->name_de = $request->name_de;
            $gift->name_hu = $request->name_hu;
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
            if ($request->has('feature_title_en')) {
                foreach ($request->input('feature_title_en') as $key => $title) {
                    $image_path = null;

                    if ($request->hasFile('feature_image') && isset($request->file('feature_image')[$key])) {
                        $file = $request->file('feature_image')[$key];
                        $image_path = Helper::fileUpload($file, 'gifts/feature-image', time() . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                    }

                    $featuredItem = new GiftFeaturedItem();
                    $featuredItem->title_en = $request->input('feature_title_en.' . $key);
                    $featuredItem->title_de = $request->input('feature_title_de.' . $key);
                    $featuredItem->title_hu = $request->input('feature_title_hu.' . $key);
                    $featuredItem->sub_title_en = $request->input('feature_sub_title_en.' . $key);
                    $featuredItem->sub_title_de = $request->input('feature_sub_title_de.' . $key);
                    $featuredItem->sub_title_hu = $request->input('feature_sub_title_hu.' . $key);
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

    public function update(Request $request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();

        $validator = $request->validate([
            'name_en' => 'required|string',
            'name_de' => 'required|string',
            'name_hu' => 'required|string',
            'video_inside' => 'nullable|string',
            'video_outside' => 'nullable|string',
            'feature_title_en.*' => 'required',
            'feature_title_de.*' => 'required',
            'feature_title_hu.*' => 'required',
            'feature_sub_title_en.*' => 'nullable|string',
            'feature_sub_title_de.*' => 'nullable|string',
            'feature_sub_title_hu.*' => 'nullable|string',
            'gift_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gift_thum_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'inside_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'outside_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'plan_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'feature_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $gift = Gift::findOrFail($id);

            // Update gift image
            if ($request->hasFile('gift_image')) {
                Helper::deleteFile($gift->image);
                $file = $request->file('gift_image');
                $gift_image_path = Helper::fileUpload($file, 'gifts', time() . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                $gift->image = $gift_image_path;
            }

            // Update gift thumbnail image
            if ($request->hasFile('gift_thum_image')) {
                Helper::deleteFile($gift->thumbnail_image);
                $file = $request->file('gift_thum_image');
                $gift_thum_image_path = Helper::fileUpload($file, 'gifts', time() . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                $gift->thumbnail_image = $gift_thum_image_path;
            }

            // Update other gift fields
            $gift->name_en = $request->name_en;
            $gift->name_de = $request->name_de;
            $gift->name_hu = $request->name_hu;
            $gift->video_link_inside = $request->video_inside;
            $gift->video_link_outside = $request->video_outside;
            $gift->save();

            // Handle inside images
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

            // Handle outside images
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

            // Handle plan images
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
            // Handle updating existing featured items
            if ($request->has('featureId')) {
                foreach ($request->input('featureId') as $key => $featuredId) {
                    $featuredItem = GiftFeaturedItem::find($featuredId);
                    if ($featuredItem) {
                        // Update fields
                        $featuredItem->title_en = $request->input('feature_title_en_old.' . $key);
                        $featuredItem->title_de = $request->input('feature_title_de_old.' . $key);
                        $featuredItem->title_hu = $request->input('feature_title_hu_old.' . $key);
                        $featuredItem->sub_title_en = $request->input('feature_sub_title_en_old.' . $key);
                        $featuredItem->sub_title_de = $request->input('feature_sub_title_de_old.' . $key);
                        $featuredItem->sub_title_hu = $request->input('feature_sub_title_hu_old.' . $key);
                        $featuredItem->save();
                    }
                }
            }

            // Handle featured items
            if ($request->has('feature_title_en')) {
                foreach ($request->input('feature_title_en') as $key => $title) {
                    if ($request->hasFile('feature_image')) {
                        $file = $request->file('feature_image')[$key] ?? null;
                        if ($file) {
                            $image_path = Helper::fileUpload($file, 'gifts/feature-image', time() . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));

                        } else {
                            $image_path = null;
                        }
                    } else {
                        $image_path = null;
                    }
                    $featuredItem = new GiftFeaturedItem();
                    $featuredItem->title_en = $request->input('feature_title_en.' . $key);
                    $featuredItem->title_de = $request->input('feature_title_de.' . $key);
                    $featuredItem->title_hu = $request->input('feature_title_hu.' . $key);
                    $featuredItem->sub_title_en = $request->input('feature_sub_title_en.' . $key);
                    $featuredItem->sub_title_de = $request->input('feature_sub_title_de.' . $key);
                    $featuredItem->sub_title_hu = $request->input('feature_sub_title_hu.' . $key);
                    $featuredItem->image = $image_path;
                    $featuredItem->gift_id = $gift->id;
                    $featuredItem->save();
                }
            }

            flash()->addSuccess("Gift Updated Successfully.");

            DB::commit();
            return redirect()->route('admin.gift.index');

        } catch (\Exception $e) {
            // Handle the exception
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
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

    public function deleteGiftGallaryImage(Request $request)
    {

        try {
            $type = $request->gift_image_type;
            $gift_id = $request->gift_id;

            // Retrieve the GiftGallary instance
            $image = GiftGallary::where('id', $request->id)
                ->where('gift_image_type', $type)
                ->where('gift_id', $gift_id)
                ->firstOrFail();

            // Delete the file
            Helper::deleteFile(public_path($image->image));

            // Delete the database record
            $image->delete();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage());
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }
    }
    public function deleteGifFeatureItem(Request $request)
    {

        try {
            $gift_id = $request->gift_id;

            // Retrieve the GiftGallary instance
            $featuredItem = GiftFeaturedItem::where('id', $request->id)
                ->where('gift_id', $gift_id)
                ->firstOrFail();

            // Delete the file
            Helper::deleteFile(public_path($featuredItem->image));

            // Delete the database record
            $featuredItem->delete();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage());
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
