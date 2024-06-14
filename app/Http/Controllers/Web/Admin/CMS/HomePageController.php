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

class HomePageController extends Controller
{
    public function index()
    {
        $ticket_chance = CMS::where('page', Page::HOME)->where('section_name', Section::TICKET_CHANCE)->first();
        $win_spin = CMS::where('page', Page::HOME)->where('section_name', Section::WIN_SPIN)->first();

        return view('admin.layouts.cms.pages.home', compact('ticket_chance', 'win_spin'));
    }

    public function updateOrCreateChance(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string',
            'title_de' => 'required|string',
            'title_hu' => 'required|string',
            'sub_title_en' => 'required|string',
            'sub_title_de' => 'required|string',
            'sub_title_hu' => 'required|string',
            'description_en' => 'required|string',
            'description_de' => 'required|string',
            'description_hu' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        try {
            $ticket_chance = CMS::where('page', Page::HOME)->where('section_name', Section::TICKET_CHANCE)->first();
            if ($request->hasFile('image')) {
                $image_path = Helper::fileUpload($request->file('image'), 'ticket-chance', time().'_'.Str::uuid());
                if (! empty($ticket_chance) && $ticket_chance->image) {
                    Helper::deleteFile(public_path($ticket_chance->image));
                }
            } else {
                $image_path = ! empty($ticket_chance) ? $ticket_chance->image : null;
            }

            CMS::updateOrCreate(['page' => Page::HOME, 'section_name' => Section::TICKET_CHANCE], [
                'page' => Page::HOME,
                'section_name' => Section::TICKET_CHANCE,
                'title_en' => $request->title_en,
                'title_de' => $request->title_de,
                'title_hu' => $request->title_hu,
                'sub_title_en' => $request->sub_title_en,
                'sub_title_de' => $request->sub_title_de,
                'sub_title_hu' => $request->sub_title_hu,
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

    public function updateOrCreateWinSpin(Request $request)
    {
        $request->validate([
            'win_title_en' => 'required|string',
            'win_title_de' => 'required|string',
            'win_title_hu' => 'required|string',
            'win_sub_title_en' => 'required|string',
            'win_sub_title_de' => 'required|string',
            'win_sub_title_hu' => 'required|string',
        ]);

        try {
            CMS::updateOrCreate(['page' => Page::HOME, 'section_name' => Section::WIN_SPIN], [
                'title_en' => $request->win_title_en,
                'title_de' => $request->win_title_de,
                'title_hu' => $request->win_title_hu,
                'sub_title_en' => $request->win_sub_title_en,
                'sub_title_de' => $request->win_sub_title_de,
                'sub_title_hu' => $request->win_sub_title_hu,
            ]);
            flash()->addSuccess('Updated successfully.');

            return redirect()->back();
        } catch (Exception $exception) {
            flash()->addError($exception->getMessage());

            return redirect()->back();
        }
    }
}
