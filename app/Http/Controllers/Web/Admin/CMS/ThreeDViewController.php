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
        //permission check
        if (! has_permission('cms menu')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $house_tour = CMS::where('section_name', Section::TREE_D_HOUSE_TOUR)->first();
        $property_view = CMS::where('section_name', Section::TREE_D_PROPERTY_VIEW)->first();
        $street_view = CMS::where('section_name', Section::TREE_D_STREET_VIEW)->first();
        $visit_your_new_home = CMS::where('section_name', Section::VISIT_YOUR_NEW_HOME)->first();
        $video_presentation_one = CMS::where('section_name', Section::VIDEO_PRESENTATION_1)->first();
        $video_presentation_two = CMS::where('section_name', Section::VIDEO_PRESENTATION_2)->first();

        return view('admin.layouts.cms.map-or-video', compact('house_tour', 'property_view', 'street_view', 'visit_your_new_home', 'video_presentation_two', 'video_presentation_one'));
    }

    public function updateOrCreateHoursTour(Request $request)
    {
        //permission check
        if (! has_permission('cms edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
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
        //permission check
        if (! has_permission('cms edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
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

    public function updateOrCreateStreetView(Request $request)
    {
        //permission check
        if (! has_permission('cms edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $request->validate([
            'link_type' => 'required|in:youtube_link,map_link',
            'map_link' => 'required_if:link_type,map_link|url|nullable',
            'video_url_en' => 'required_if:s_link_type,youtube_link|url|nullable',
            'video_url_de' => 'required_if:s_link_type,youtube_link|url|nullable',
            'video_url_hu' => 'required_if:s_link_type,youtube_link|url|nullable',
        ]);
        try {
            if ($request->link_type == 'map_link') {
                $request->video_url_en = null;
                $request->video_url_de = null;
                $request->video_url_hu = null;
            } else {
                $request->map_link = null;
            }
            CMS::updateOrCreate(['section_name' => Section::VISIT_YOUR_NEW_HOME], [
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

    public function updateOrCreateVisitYourNewHome(Request $request)
    {
        //permission check
        if (! has_permission('cms edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $request->validate([
            'h_link_type' => 'required|in:youtube_link,map_link',
            'h_map_link' => 'required_if:h_link_type,map_link|url|nullable',
            'h_video_url_en' => 'required_if:h_link_type,youtube_link|url|nullable',
            'h_video_url_de' => 'required_if:h_link_type,youtube_link|url|nullable',
            'h_video_url_hu' => 'required_if:h_link_type,youtube_link|url|nullable',
        ]);
        try {
            if ($request->h_link_type == 'map_link') {
                $request->h_video_url_en = null;
                $request->h_video_url_de = null;
                $request->h_video_url_hu = null;
            } else {
                $request->h_map_link = null;
            }
            CMS::updateOrCreate(['section_name' => Section::VISIT_YOUR_NEW_HOME], [
                'link' => $request->h_map_link,
                'link_en' => convertToEmbedUrl($request->h_video_url_en),
                'link_de' => convertToEmbedUrl($request->h_video_url_de),
                'link_hu' => convertToEmbedUrl($request->h_video_url_hu),
            ]);
            flash()->addSuccess('Updated successfully.');

            return redirect()->back();
        } catch (Exception $exception) {
            flash()->addError($exception->getMessage());

            return redirect()->back();
        }
    }

    public function videoPresentationOne(Request $request)
    {
        // Permission check
        if (! has_permission('cms edit')) {
            abort('403', 'Permission denied: You do not have permission to access this page');
        }

        $request->validate([
            'presentation_one_link_type' => 'required|in:youtube_link,map_link',
            'presentation_one_map_link' => 'required_if:presentation_one_link_type,map_link|url|nullable',
            'presentation_one_video_url_en' => 'required_if:presentation_one_link_type,youtube_link|url|nullable',
            'presentation_one_video_url_de' => 'required_if:presentation_one_link_type,youtube_link|url|nullable',
            'presentation_one_video_url_hu' => 'required_if:presentation_one_link_type,youtube_link|url|nullable',
        ]);

        try {
            if ($request->presentation_one_link_type == 'map_link') {
                $request->presentation_one_video_url_en = null;
                $request->presentation_one_video_url_de = null;
                $request->presentation_one_video_url_hu = null;
            } else {
                $request->presentation_one_map_link = null;
            }

            CMS::updateOrCreate(['section_name' => Section::VIDEO_PRESENTATION_1], [
                'link' => $request->presentation_one_map_link,
                'link_en' => convertToEmbedUrl($request->presentation_one_video_url_en),
                'link_de' => convertToEmbedUrl($request->presentation_one_video_url_de),
                'link_hu' => convertToEmbedUrl($request->presentation_one_video_url_hu),
            ]);

            flash()->addSuccess('Updated successfully.');

            return redirect()->back();
        } catch (Exception $exception) {
            flash()->addError($exception->getMessage());

            return redirect()->back();
        }
    }

    public function videoPresentationTwo(Request $request)
    {
        // Permission check
        if (! has_permission('cms edit')) {
            abort('403', 'Permission denied: You do not have permission to access this page');
        }

        $request->validate([
            'presentation_two_link_type' => 'required|in:youtube_link,map_link',
            'presentation_two_map_link' => 'required_if:presentation_two_link_type,map_link|url|nullable',
            'presentation_two_video_url_en' => 'required_if:presentation_two_link_type,youtube_link|url|nullable',
            'presentation_two_video_url_de' => 'required_if:presentation_two_link_type,youtube_link|url|nullable',
            'presentation_two_video_url_hu' => 'required_if:presentation_two_link_type,youtube_link|url|nullable',
        ]);

        try {
            if ($request->presentation_two_link_type == 'map_link') {
                $request->presentation_two_video_url_en = null;
                $request->presentation_two_video_url_de = null;
                $request->presentation_two_video_url_hu = null;
            } else {
                $request->presentation_two_map_link = null;
            }

            CMS::updateOrCreate(['section_name' => Section::VIDEO_PRESENTATION_2], [
                'link' => $request->presentation_two_map_link,
                'link_en' => convertToEmbedUrl($request->presentation_two_video_url_en),
                'link_de' => convertToEmbedUrl($request->presentation_two_video_url_de),
                'link_hu' => convertToEmbedUrl($request->presentation_two_video_url_hu),
            ]);

            flash()->addSuccess('Updated successfully.');

            return redirect()->back();
        } catch (Exception $exception) {
            flash()->addError($exception->getMessage());

            return redirect()->back();
        }
    }
}
