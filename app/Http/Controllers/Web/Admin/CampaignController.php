<?php

namespace App\Http\Controllers\Web\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Gift;
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
        $gifts = Gift::where('status','active')->get();
        return view('admin.layouts.campaign.create', compact('gifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|string',
           'gift_id'=>'required|integer|exists:gifts,id',
           'campaign_type'=>'required|in:2,3',
           'unique_text'=> 'required|string|unique:campaigns,unique_text',
           'purchase_limit'=>'integer|required',
           'end_date' => 'required_if:campaign_type,2',
           'price'   => 'required|numeric',
           'limit'=>'nullable|integer|required_if:campaign_type,3',
           'ebook_file'=>'file|required',
           'thumbnail'=>'required|image|mimes:jpeg,jpg,png|max:2048',
        ],
            [
                'thumbnail.max'=> 'Thumbnail max size 2 MB',
            ]
        );
        $thumbnail = $request->file('thumbnail');
        if ($request->file('thumbnail') && $request->file('thumbnail')->isValid()) {
            $thumbnail_path = Helper::fileUpload($thumbnail,'campaign/',time().'_'.pathinfo($thumbnail->getClientOriginalName(),PATHINFO_FILENAME));
        }else{
            $thumbnail_path = null;
        }

        if ($request->file('ebook_file') && $request->file('ebook_file')->isValid()) {
            $file_path = $request->file('ebook_file')->store('ebook');
            Campaign::create([
                'name' => $request->name,
                'gift_id' => $request->gift_id,
                'target_type' => $request->campaign_type,
                'unique_text' => $request->unique_text,
                'purchase_limit' => $request->purchase_limit,
                'thumbnail' => $thumbnail_path,
                'price' => $request->price,
                'end_time' => $request->end_date,
                'limit' => $request->limit,
                'ebook' => $file_path,
            ]);
            flash()->addSuccess('Campaign created successfully.');
            return redirect()->route('admin.campaign.index');
        }else{
            flash()->addWarning('Invalid Ebook File!');
            return redirect()->back();
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
        $campaign = Campaign::findOrFail($id);
        $gifts = Gift::where('status','active')->get();
        return view('admin.layouts.campaign.edit', compact('campaign','gifts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'gift_id'=>'required|integer|exists:gifts,id',
            'campaign_type'=>'required|in:2,3',
            'unique_text'=> 'required|string|unique:campaigns,unique_text,'.$id,
            'purchase_limit'=>'integer|required',
            'price'   => 'required|numeric',
            'end_date' => 'required_if:campaign_type,2',
            'limit'=>'nullable|integer|required_if:campaign_type,3',
            'ebook_file'=>'file|nullable',
            'thumbnail'=>'image|nullable|mimes:jpeg,jpg,png|max:2048',
        ],
            [
                'thumbnail.max'=> 'Thumbnail max size 2 MB',
            ]
        );
        $thumbnail = $request->file('thumbnail');
        $campaign = Campaign::findOrFail($id);
        if ($request->file('thumbnail') && $request->file('thumbnail')->isValid()) {
            $thumbnail_path = Helper::fileUpload($thumbnail,'/campaign/',time().'_'.pathinfo($thumbnail->getClientOriginalName(),PATHINFO_FILENAME));
            Helper::deleteFile(public_path($campaign->thumbnail));
        }else{
            $thumbnail_path = $campaign->thumbnail;
        }

        if ($request->file('ebook_file') && $request->file('ebook_file')->isValid()) {
            $file_path = $request->file('ebook_file')->store('ebook');
            if (!empty($campaign->ebook) && Storage::exists($campaign->ebook)) {
                Storage::delete($campaign->ebook);
            }
        }else{
            $file_path = $campaign->ebook;
        }

       $campaign->update([
            'name' => $request->name,
            'gift_id' => $request->gift_id,
            'target_type' => $request->campaign_type,
            'unique_text' => $request->unique_text,
            'purchase_limit' => $request->purchase_limit,
            'thumbnail' => $thumbnail_path,
            'price' => $request->price,
            'end_time' => $request->end_date,
            'limit' => $request->limit,
            'ebook' => $file_path,
        ]);
        flash()->addSuccess('Campaign updated successfully.');
        return redirect()->route('admin.campaign.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $campaign = Campaign::findOrFail($id);
        if (!empty($campaign->ebook) && Storage::exists($campaign->ebook)) {
            Storage::delete($campaign->ebook);
        }
        if ($campaign->thumbnail){
            Helper::deleteFile(public_path($campaign->thumbnail));
        }

        $campaign->delete();
        flash()->addSuccess('Campaign deleted successfully.');
        return redirect()->route('admin.campaign.index');
    }
}
