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
    public function index()
    {
        $campaigns = Campaign::paginate(20);

        return view('admin.layouts.campaign.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gifts = Gift::where('status', 'active')->get();

        return view('admin.layouts.campaign.create', compact('gifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_de' => 'required|string',
            'name_hu' => 'required|string',
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
        ],
            [
                'thumbnail.max' => 'Thumbnail max size 5 MB',
                'unique_text.regex' => 'The unique text field must contain only alphabetic characters.',
            ]
        );

        try {
            $thumbnail = $request->file('thumbnail');
            if ($request->file('thumbnail') && $request->file('thumbnail')->isValid()) {
                $thumbnail_path = Helper::fileUpload($thumbnail, 'campaign/', time().'_'.pathinfo($thumbnail->getClientOriginalName(), PATHINFO_FILENAME));
            } else {
                $thumbnail_path = null;
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
        $campaign = Campaign::with(['ebooks'])->findOrFail($id);
        $gifts = Gift::where('status', 'active')->get();

        return view('admin.layouts.campaign.edit', compact('campaign', 'gifts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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
        ],
            [
                'thumbnail.max' => 'Thumbnail max size 5 MB',
            ]
        );

        try {
            $thumbnail = $request->file('thumbnail');
            $campaign = Campaign::findOrFail($id);
            if ($request->file('thumbnail') && $request->file('thumbnail')->isValid()) {
                $thumbnail_path = Helper::fileUpload($thumbnail, '/campaign/', time().'_'.pathinfo($thumbnail->getClientOriginalName(), PATHINFO_FILENAME));
                Helper::deleteFile(public_path($campaign->thumbnail));
            } else {
                $thumbnail_path = $campaign->thumbnail;
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
