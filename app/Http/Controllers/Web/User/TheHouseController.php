<?php

namespace App\Http\Controllers\Web\User;

use App\Enums\Section;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\CMS;
use App\Models\Gift;
use App\Models\HouseFile;
use Illuminate\Support\Facades\Log;

class TheHouseController extends Controller
{
    public function index()
    {

        $campaign = Campaign::latest()->where('status', 'published')->first();
        $houseTour = CMS::where('section_name', Section::TREE_D_HOUSE_TOUR)->first();
        $propertyView = CMS::where('section_name', Section::TREE_D_PROPERTY_VIEW)->first();

        if ($campaign) {
            $gift = Gift::where('status', 'active')->where('id', $campaign->gift_id)->first();

            if ($gift && ! empty($gift)) {
                $giftRandomImages = $gift->giftGallary()
                    ->where(function ($query) {
                        $query->where('gift_image_type', 'inside')
                            ->orWhere('gift_image_type', 'outside');
                    })
                    ->inRandomOrder()
                    ->limit(20)
                    ->get();
                $keyFeatures = $gift->keyFeatures()->where('status', 'active')->where('gift_id', $gift->id)->get();
                $houseFiles = HouseFile::where('status', Status::ACTIVE)->where('gift_id', $gift->id)->get();
            } else {
                $gift = null;
                $giftRandomImages = null;
                $keyFeatures = null;
            }
        } else {
            $gift = null;
            $giftRandomImages = null;
            $keyFeatures = null;
        }

        return view('user.layouts.house', compact('giftRandomImages', 'keyFeatures', 'houseTour', 'propertyView', 'houseFiles'));
    }

    public function downloadHouseFile($id)
    {
        try {
            $houseFile = HouseFile::findOrFail($id);

            return response()->download($houseFile->file_path);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('user.house')->with('error', 'Failed to download the file.');
        }
    }
}
