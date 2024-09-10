<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Ebook;
use App\Models\Gift;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //check permission
        if (! has_permission('campaign menu')) {
            abort(403, 'Permission denied: You do not have permission access this page');
        }
        $campaigns = Campaign::when($request->status, function ($query, $value) {
            $query->where('status', $value);
        })->when($request->search, function ($query, $value) {
            $query->where('name_en', 'like', '%'.$value.'%');
        })->paginate(20);

        return view('admin.layouts.campaign.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (! has_permission('campaign create')) {
            abort(403, 'Permission denied: You do not have permission access this page');
        }
        $gifts = Gift::where('status', 'active')->get();

        return view('admin.layouts.campaign.create', compact('gifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! has_permission('campaign create')) {
            abort(403, 'Permission denied: You do not have permission access this page');
        }
        //        dd($request->all());
        $request->validate([
            'name' => 'required|array',
            'name.*' => 'required|string',
            'gift_id' => 'required|integer|exists:gifts,id',
            //           'campaign_type'=>'required|in:2,3',
            'unique_text' => 'required|string|regex:/^[a-zA-Z]+$/|unique:campaigns,unique_text',
            //           'purchase_limit'=>'integer|required',
            //           'end_date' => 'required_if:campaign_type,2',
            'price' => 'required|numeric|min:0',
            'limit' => 'required|integer|min:0',
            'ebook_files' => 'array|required',
            'ebook_files.*' => 'file|required|max:5120',
            'thumbnail' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'how_many_buy' => 'required_with:how_many_free|nullable|numeric|min:0',
            'how_many_free' => 'required_with:how_many_buy|nullable|numeric|min:0',
            'discount_percent' => 'required_with:discount_expire_date|nullable|numeric|min:0',
            'discount_expire_date' => 'required_with:discount_percent|nullable|date_format:Y-m-d\TH:i',
            'promotion_banner_en' => 'nullable|required_with:promotion_banner_de,promotion_banner_hu,mobile_promotion_banner_en,mobile_promotion_banner_de,mobile_promotion_banner_hu|image|mimes:jpeg,jpg,png|max:5120',
            'promotion_banner_de' => 'nullable|required_with:promotion_banner_en,promotion_banner_hu,mobile_promotion_banner_en,mobile_promotion_banner_de,mobile_promotion_banner_hu|image|mimes:jpeg,jpg,png|max:5120',
            'promotion_banner_hu' => 'nullable|required_with:promotion_banner_en,promotion_banner_de,mobile_promotion_banner_en,mobile_promotion_banner_de,mobile_promotion_banner_hu|image|mimes:jpeg,jpg,png|max:5120',
            'mobile_promotion_banner_en' => 'nullable|required_with:promotion_banner_en,promotion_banner_de,promotion_banner_hu,mobile_promotion_banner_de,mobile_promotion_banner_hu|image|mimes:jpeg,jpg,png|max:5120',
            'mobile_promotion_banner_de' => 'nullable|required_with:promotion_banner_en,promotion_banner_de,promotion_banner_hu,mobile_promotion_banner_en,mobile_promotion_banner_hu|image|mimes:jpeg,jpg,png|max:5120',
            'mobile_promotion_banner_hu' => 'nullable|required_with:promotion_banner_en,promotion_banner_de,promotion_banner_hu,mobile_promotion_banner_en,mobile_promotion_banner_de|image|mimes:jpeg,jpg,png|max:5120',
        ],
            [
                'thumbnail.max' => 'Thumbnail max size 5 MB',
                'promotion_banner_en.max' => 'Banner en max size 5 MB',
                'promotion_banner_de.max' => 'Banner de max size 5 MB',
                'promotion_banner_hu.max' => 'Banner hu max size 5 MB',
                'mobile_promotion_banner_en.max' => 'Mobile Banner en max size 5 MB',
                'mobile_promotion_banner_de.max' => 'Mobile Banner de max size 5 MB',
                'mobile_promotion_banner_hu.max' => 'Mobile Banner hu max size 5 MB',
                'unique_text.regex' => 'The unique text field must contain only alphabetic characters.',
            ]
        );

        try {
            $thumbnail = $request->file('thumbnail');
            if ($thumbnail && $thumbnail->isValid()) {
                $thumbnail_path = Helper::fileUpload($thumbnail, 'campaign/', time().'_'.pathinfo($thumbnail->getClientOriginalName(), PATHINFO_FILENAME));
            } else {
                flash()->addError('Invalid thumbnail image file.');

                return redirect()->back();
            }
            $banner_en = $request->file('promotion_banner_en');
            $banner_de = $request->file('promotion_banner_de');
            $banner_hu = $request->file('promotion_banner_hu');
            $mobile_banner_en = $request->file('mobile_promotion_banner_en');
            $mobile_banner_de = $request->file('mobile_promotion_banner_de');
            $mobile_banner_hu = $request->file('mobile_promotion_banner_hu');

            // Regular banners
            if ($banner_en && $banner_en->isValid()) {
                $banner_path_en = Helper::fileUpload($banner_en, 'campaign/banner', time().'_'.pathinfo($banner_en->getClientOriginalName(), PATHINFO_FILENAME));
            } else {
                $banner_path_en = null;
            }
            if ($banner_de && $banner_de->isValid()) {
                $banner_path_de = Helper::fileUpload($banner_de, 'campaign/banner', time().'_'.pathinfo($banner_de->getClientOriginalName(), PATHINFO_FILENAME));
            } else {
                $banner_path_de = null;
            }
            if ($banner_hu && $banner_hu->isValid()) {
                $banner_path_hu = Helper::fileUpload($banner_hu, 'campaign/banner', time().'_'.pathinfo($banner_hu->getClientOriginalName(), PATHINFO_FILENAME));
            } else {
                $banner_path_hu = null;
            }

            // Mobile banners
            if ($mobile_banner_en && $mobile_banner_en->isValid()) {
                $mobile_banner_path_en = Helper::fileUpload($mobile_banner_en, 'campaign/mobile_banner', time().'_'.pathinfo($mobile_banner_en->getClientOriginalName(), PATHINFO_FILENAME));
            } else {
                $mobile_banner_path_en = null;
            }
            if ($mobile_banner_de && $mobile_banner_de->isValid()) {
                $mobile_banner_path_de = Helper::fileUpload($mobile_banner_de, 'campaign/mobile_banner', time().'_'.pathinfo($mobile_banner_de->getClientOriginalName(), PATHINFO_FILENAME));
            } else {
                $mobile_banner_path_de = null;
            }
            if ($mobile_banner_hu && $mobile_banner_hu->isValid()) {
                $mobile_banner_path_hu = Helper::fileUpload($mobile_banner_hu, 'campaign/mobile_banner', time().'_'.pathinfo($mobile_banner_hu->getClientOriginalName(), PATHINFO_FILENAME));
            } else {
                $mobile_banner_path_hu = null;
            }

            $campaign = Campaign::create([
                'name_en' => $request->name_en,
                'name_de' => $request->name_de,
                'name_hu' => $request->name_hu,
                'gift_id' => $request->gift_id,
                'unique_text' => $request->unique_text,
                'thumbnail' => $thumbnail_path,
                'price' => $request->price,
                'limit' => $request->limit,
                'how_many_buy' => $request->how_many_buy,
                'how_many_free' => $request->how_many_free,
                'discount_percent' => $request->discount_percent,
                'discount_expire_date' => $request->discount_expire_date,
                'promotion_banner_en' => $banner_path_en,
                'promotion_banner_de' => $banner_path_de,
                'promotion_banner_hu' => $banner_path_hu,
                'mobile_promotion_banner_en' => $mobile_banner_path_en,
                'mobile_promotion_banner_de' => $mobile_banner_path_de,
                'mobile_promotion_banner_hu' => $mobile_banner_path_hu,
                'status' => Status::DRAFT,
            ]);

            foreach ($request->ebook_files as $ebook_file) {
                $file_path = $ebook_file->store('ebook');
                Ebook::create([
                    'file' => $file_path,
                    'campaign_id' => $campaign->id,
                ]);
            }
            flash()->addSuccess('Campaign created successfully.');

            return redirect()->route('admin.campaign.index');
        } catch (Exception $exception) {
            flash()->addError($exception->getMessage());

            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (! has_permission('campaign edit')) {
            abort(403, 'Permission denied: You do not have permission access this page');
        }
        $campaign = Campaign::with(['ebooks'])->findOrFail($id);
        $gifts = Gift::where('status', 'active')->get();

        return view('admin.layouts.campaign.edit', compact('campaign', 'gifts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (! has_permission('campaign edit')) {
            abort(403, 'Permission denied: You do not have permission access this page');
        }
        $request->validate([
            'name_en' => 'required|string',
            'name_de' => 'required|string',
            'name_hu' => 'required|string',
            'gift_id' => 'required|integer|exists:gifts,id',
            //           'campaign_type'=>'required|in:2,3',
            'unique_text' => 'required|string|unique:campaigns,unique_text,'.$id,
            //           'purchase_limit'=>'integer|required',
            //           'end_date' => 'required_if:campaign_type,2',
            'price' => 'required|numeric',
            'limit' => 'required|integer',
            'ebook_files' => 'array|nullable',
            'ebook_files.*' => 'file|required|max:5120',
            'thumbnail' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'how_many_buy' => 'required_with:how_many_free|nullable|numeric|min:0',
            'how_many_free' => 'required_with:how_many_buy|nullable|numeric|min:0',
            'discount_percent' => 'required_with:discount_expire_date|nullable|numeric|min:0',
            'discount_expire_date' => 'required_with:discount_percent|nullable|date_format:Y-m-d\TH:i',
            'promotion_banner_en' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'promotion_banner_de' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'promotion_banner_hu' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'mobile_promotion_banner_en' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'mobile_promotion_banner_de' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'mobile_promotion_banner_hu' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
        ],
            [
                'thumbnail.max' => 'Thumbnail max size 5 MB',
                'promotion_banner_en.max' => 'Banner en max size 5 MB',
                'promotion_banner_de.max' => 'Banner de max size 5 MB',
                'promotion_banner_hu.max' => 'Banner hu max size 5 MB',
                'mobile_promotion_banner_en.max' => 'Mobile banner en max size 5 MB',
                'mobile_promotion_banner_de.max' => 'Mobile banner de max size 5 MB',
                'mobile_promotion_banner_hu.max' => 'Mobile banner hu max size 5 MB',
            ]
        );

        try {
            $thumbnail = $request->file('thumbnail');
            $campaign = Campaign::findOrFail($id);
            if ($request->file('thumbnail') && $request->file('thumbnail')->isValid()) {
                $thumbnail_path = Helper::fileUpload($thumbnail, 'campaign/', time().'_'.pathinfo($thumbnail->getClientOriginalName(), PATHINFO_FILENAME));
                Helper::deleteFile(public_path($campaign->thumbnail));
            } else {
                $thumbnail_path = $campaign->thumbnail;
            }
            $banner_en = $request->file('promotion_banner_en');
            $banner_de = $request->file('promotion_banner_de');
            $banner_hu = $request->file('promotion_banner_hu');
            $mobile_banner_en = $request->file('mobile_promotion_banner_en');
            $mobile_banner_de = $request->file('mobile_promotion_banner_de');
            $mobile_banner_hu = $request->file('mobile_promotion_banner_hu');

            // Regular banners
            if ($banner_en && $banner_en->isValid()) {
                $banner_path_en = Helper::fileUpload($banner_en, 'campaign/banner', time().'_'.pathinfo($banner_en->getClientOriginalName(), PATHINFO_FILENAME));
                Helper::deleteFile(public_path($campaign->promotion_banner_en));
            } else {
                $banner_path_en = $campaign->promotion_banner_en;
            }
            if ($banner_de && $banner_de->isValid()) {
                $banner_path_de = Helper::fileUpload($banner_de, 'campaign/banner', time().'_'.pathinfo($banner_de->getClientOriginalName(), PATHINFO_FILENAME));
                Helper::deleteFile(public_path($campaign->promotion_banner_de));
            } else {
                $banner_path_de = $campaign->promotion_banner_de;
            }
            if ($banner_hu && $banner_hu->isValid()) {
                $banner_path_hu = Helper::fileUpload($banner_hu, 'campaign/banner', time().'_'.pathinfo($banner_hu->getClientOriginalName(), PATHINFO_FILENAME));
                Helper::deleteFile(public_path($campaign->promotion_banner_hu));
            } else {
                $banner_path_hu = $campaign->promotion_banner_hu;
            }

            // Mobile banners
            if ($mobile_banner_en && $mobile_banner_en->isValid()) {
                $mobile_banner_path_en = Helper::fileUpload($mobile_banner_en, 'campaign/mobile_banner', time().'_'.pathinfo($mobile_banner_en->getClientOriginalName(), PATHINFO_FILENAME));
                Helper::deleteFile(public_path($campaign->mobile_promotion_banner_en));
            } else {
                $mobile_banner_path_en = $campaign->mobile_promotion_banner_en;
            }
            if ($mobile_banner_de && $mobile_banner_de->isValid()) {
                $mobile_banner_path_de = Helper::fileUpload($mobile_banner_de, 'campaign/mobile_banner', time().'_'.pathinfo($mobile_banner_de->getClientOriginalName(), PATHINFO_FILENAME));
                Helper::deleteFile(public_path($campaign->mobile_promotion_banner_de));
            } else {
                $mobile_banner_path_de = $campaign->mobile_promotion_banner_de;
            }
            if ($mobile_banner_hu && $mobile_banner_hu->isValid()) {
                $mobile_banner_path_hu = Helper::fileUpload($mobile_banner_hu, 'campaign/mobile_banner', time().'_'.pathinfo($mobile_banner_hu->getClientOriginalName(), PATHINFO_FILENAME));
                Helper::deleteFile(public_path($campaign->mobile_promotion_banner_hu));
            } else {
                $mobile_banner_path_hu = $campaign->mobile_promotion_banner_hu;
            }

            $campaign->update([
                'name_en' => $request->name_en,
                'name_de' => $request->name_de,
                'name_hu' => $request->name_hu,
                'gift_id' => $request->gift_id,
                //                'unique_text' => $request->unique_text, //(should not be updated)
                'thumbnail' => $thumbnail_path,
                'price' => $request->price,
                'limit' => $request->limit,
                'how_many_buy' => $request->how_many_buy,
                'how_many_free' => $request->how_many_free,
                'discount_percent' => $request->discount_percent,
                'discount_expire_date' => $request->discount_expire_date,
                'promotion_banner_en' => $banner_path_en,
                'promotion_banner_de' => $banner_path_de,
                'promotion_banner_hu' => $banner_path_hu,
                'mobile_promotion_banner_en' => $mobile_banner_path_en,
                'mobile_promotion_banner_de' => $mobile_banner_path_de,
                'mobile_promotion_banner_hu' => $mobile_banner_path_hu,
            ]);

            if ($request->ebook_files && count($request->ebook_files) > 0) {
                foreach ($request->ebook_files as $ebook_file) {
                    $file_path = $ebook_file->store('ebook');
                    Ebook::create([
                        'file' => $file_path,
                        'campaign_id' => $campaign->id,
                    ]);
                }
            }
            flash()->addSuccess('Campaign updated successfully.');

            return redirect()->route('admin.campaign.index');
        } catch (Exception $e) {
            flash()->addError($e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! has_permission('campaign delete')) {
            abort(403, 'Permission denied: You do not have permission access this page');
        }
        try {
            $campaign = Campaign::with(['ebooks'])->findOrFail($id);

            foreach ($campaign->ebooks as $ebook) {
                if (! empty($ebook) && Storage::exists($ebook->file)) {
                    Storage::delete($ebook->file);
                }
                $ebook->delete();
            }

            if ($campaign->thumbnail) {
                Helper::deleteFile(public_path($campaign->thumbnail));
            }

            $campaign->delete();
            flash()->addSuccess('Campaign deleted successfully.');

            return redirect()->route('admin.campaign.index');
        } catch (Exception $e) {
            flash()->addError($e->getMessage());

            return redirect()->back();
        }
    }

    public function destroyEbook($id)
    {
        if (! has_permission('campaign edit')) {
            return response()->json([
                'success' => false,
                'message' => 'Permission denied: You do not have permission access this page',
            ]);
        }
        $ebook = Ebook::findOrFail($id);
        $campaign = Campaign::withCount(['ebooks'])->findOrFail($ebook->campaign_id);
        if ($campaign->ebooks_count <= 1) {
            return response()->json([
                'success' => false,
                'message' => "This is the last item; you can't delete this item.",
            ]);
        }
        if (! empty($ebook) && Storage::exists($ebook->file)) {
            Storage::delete($ebook->file);
        }
        $ebook->delete();

        return response()->json([
            'success' => true,
            'message' => 'Ebook deleted successfully.',
        ]);
    }

    public function status(Request $request, $id)
    {
        //permission check
        if (! has_permission('campaign status')) {
            return response()->json([
                'success' => false,
                'message' => 'Permission denied: You do not have permission access this page',
            ]);
        }
        try {
            if ($request->status === Status::PUBLISHED) {
                $campaign_count = Campaign::where('status', Status::PUBLISHED)->where('id', '!=', $id)->count();
                if ($campaign_count > 0) {
                    return response()->json([
                        'success' => false,
                        'is_exist' => true,
                        'message' => "An existing campaign has been published. Please change the status to either 'Draft' or 'Completed'.",
                    ]);
                }
            }

            Campaign::findOrFail($id)->update([
                'status' => $request->status,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Campaign Status Changed Successfully.',
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
