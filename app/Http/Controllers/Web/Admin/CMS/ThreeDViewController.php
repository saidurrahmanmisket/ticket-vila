<?php

namespace App\Http\Controllers\Web\Admin\CMS;

use App\Enums\Section;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Exception;
use Illuminate\Http\Request;

class ThreeDViewController extends Controller
{
    public function mapOrVideo()
    {
        $house_tour = CMS::where('section_name', Section::TREE_D_HOUSE_TOUR)->first();
        $property_view = CMS::where('section_name', Section::TREE_D_PROPERTY_VIEW)->first();

        return view('admin.layouts.cms.map-or-video', compact('house_tour', 'property_view'));
    }

    public function updateOrCreateHoursTour(Request $request)
    {
        $request->validate([
            'link_type' => 'required|in:youtube_link,map_link',
            'map_link' => 'required_if:link_type,map_link|url|nullable',
            'video_url_en' => 'required_if:link_type,youtube_link|url|nullable',
            'video_url_de' => 'required_if:link_type,youtube_link|url|nullable',
            'video_url_hu' => 'required_if:link_type,youtube_link|url|nullable',
        ]);
        try {
            if ($request->link_type == 'map_link') {
                $request->video_url_en = null;
                $request->video_url_de = null;
                $request->video_url_hu = null;
            } else {
                $request->map_link = null;
            }
            CMS::updateOrCreate(['section_name' => Section::TREE_D_HOUSE_TOUR], [
                'link' => $request->map_link,
                'link_en' => convertToEmbedUrl($request->video_url_en),
                'link_de' => convertToEmbedUrl($request->video_url_de),
                'link_hu' => convertToEmbedUrl($request->video_url_hu),
            ]);
            flash()->addSuccess('Updated successfully.');

            return redirect()->back();
        } catch (Exception $exception) {
            flash()->addError($exception->getMessage());

            return redirect()->back();
        }
    }

    public function updateOrCreatePropertyView(Request $request)
    {
        $request->validate([
            'p_link_type' => 'required|in:youtube_link,map_link',
            'p_map_link' => 'required_if:p_link_type,map_link|url|nullable',
            'p_video_url_en' => 'required_if:p_link_type,youtube_link|url|nullable',
            'p_video_url_de' => 'required_if:p_link_type,youtube_link|url|nullable',
            'p_video_url_hu' => 'required_if:p_link_type,youtube_link|url|nullable',
        ]);
        try {
            if ($request->p_link_type == 'map_link') {
                $request->p_video_url_en = null;
                $request->p_video_url_de = null;
                $request->p_video_url_hu = null;
            } else {
                $request->p_map_link = null;
            }
            CMS::updateOrCreate(['section_name' => Section::TREE_D_PROPERTY_VIEW], [
                'link' => $request->p_map_link,
                'link_en' => convertToEmbedUrl($request->p_video_url_en),
                'link_de' => convertToEmbedUrl($request->p_video_url_de),
                'link_hu' => convertToEmbedUrl($request->p_video_url_hu),
            ]);
            flash()->addSuccess('Updated successfully.');

            return redirect()->back();
        } catch (Exception $exception) {
            flash()->addError($exception->getMessage());

            return redirect()->back();
        }
    }
}
