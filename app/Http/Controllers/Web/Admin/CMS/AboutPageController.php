<?php

namespace App\Http\Controllers\Web\Admin\CMS;

use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutPageController extends Controller
{
    public function index()
    {
        $the_mission = CMS::where('page', Page::ABOUT_US)->where('section_name', Section::THE_MISSION)->first();
        $the_transparency = CMS::where('page', Page::ABOUT_US)->where('section_name', Section::THE_TRANSPARENCY)->first();

        return view('admin.layouts.cms.pages.about', compact('the_mission', 'the_transparency'));
    }

    public function theMission(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string',
            'title_de' => 'required|string',
            'title_hu' => 'required|string',
            'description_en' => 'required|string',
            'description_de' => 'required|string',
            'description_hu' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        try {
            $the_mission = CMS::where('page', Page::ABOUT_US)->where('section_name', Section::THE_MISSION)->first();
            if ($request->hasFile('image')) {
                $image_path = Helper::fileUpload($request->file('image'), 'the-mission', time().'_'.Str::uuid());
                if (! empty($the_mission) && $the_mission->image) {
                    Helper::deleteFile(public_path($the_mission->image));
                }
            } else {
                $image_path = ! empty($the_mission) ? $the_mission->image : null;
            }

            CMS::updateOrCreate(['page' => Page::ABOUT_US, 'section_name' => Section::THE_MISSION], [
                'page' => Page::ABOUT_US,
                'section_name' => Section::THE_MISSION,
                'title_en' => $request->title_en,
                'title_de' => $request->title_de,
                'title_hu' => $request->title_hu,
                'description_en' => $request->description_en,
                'description_de' => $request->description_de,
                'description_hu' => $request->description_hu,
                'image' => $image_path,
            ]);
            flash()->addSuccess('Successfully updated.');

            return redirect()->back();
        } catch (Exception $exception) {
            flash()->addError($exception->getMessage());

            return redirect()->back();
        }
    }

    public function theTransparency(Request $request)
    {
        $request->validate([
            't_title_en' => 'required|string',
            't_title_de' => 'required|string',
            't_title_hu' => 'required|string',
            't_description_en' => 'required|string',
            't_description_de' => 'required|string',
            't_description_hu' => 'required|string',
        ]);
        try {
            CMS::updateOrCreate(['page' => Page::ABOUT_US, 'section_name' => Section::THE_TRANSPARENCY], [
                'page' => Page::ABOUT_US,
                'section_name' => Section::THE_TRANSPARENCY,
                'title_en' => $request->t_title_en,
                'title_de' => $request->t_title_de,
                'title_hu' => $request->t_title_hu,
                'description_en' => $request->t_description_en,
                'description_de' => $request->t_description_de,
                'description_hu' => $request->t_description_hu,
            ]);
            flash()->addSuccess('Successfully updated.');

            return redirect()->back();
        } catch (Exception $exception) {
            flash()->addError($exception->getMessage());

            return redirect()->back();
        }
    }
}
