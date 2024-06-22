<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\RaffleRules;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RaffleRulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $raffleRules = RaffleRules::orderBy('sort_id', 'asc')->paginate(20);

        return view('admin.layouts.cms.pages.raffle-rules.index', compact('raffleRules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.cms.pages.raffle-rules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string',
            'title_de' => 'required|string',
            'title_hu' => 'required|string',
            'description_en' => 'required|string',
            'description_de' => 'required|string',
            'description_hu' => 'required|string',
            'button_type' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $image_path = Helper::fileUpload($request->file('image'), 'raffle-rules', time().'_'.Str::uuid());
        } else {
            $image_path = null;
        }

        $lastOrderItem = RaffleRules::orderBy('sort_id', 'desc')->first();

        $raffle_rule = new RaffleRules();
        $raffle_rule->title_en = $request->title_en;
        $raffle_rule->title_de = $request->title_de;
        $raffle_rule->title_hu = $request->title_hu;
        $raffle_rule->description_en = $request->description_en;
        $raffle_rule->description_de = $request->description_de;
        $raffle_rule->description_hu = $request->description_hu;
        $raffle_rule->button_type = $request->button_type;
        $raffle_rule->image = $image_path;
        $raffle_rule->sort_id = ! empty($lastOrderItem) ? $lastOrderItem->sort_id + 1 : 0;
        $raffle_rule->save();

        flash()->addSuccess('Raffle Rule has been created');

        return redirect()->route('admin.cms.raffle-rules.index');
    }

    public function status(string $id)
    {
        $raffleRules = RaffleRules::findOrFail($id);
        if ($raffleRules->status == Status::ACTIVE) {
            $raffleRules->status = Status::INACTIVE;
        } else {
            $raffleRules->status = Status::ACTIVE;
        }
        $raffleRules->save();
        $raffleRules = RaffleRules::orderBy('sort_id', 'asc')->paginate(20);

        return view('admin.layouts.cms.pages.raffle-rules.list', compact('raffleRules'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $raffleRule = RaffleRules::findOrFail($id);

        return view('admin.layouts.cms.pages.raffle-rules.edit', compact('raffleRule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title_en' => 'required|string',
            'title_de' => 'required|string',
            'title_hu' => 'required|string',
            'description_en' => 'required|string',
            'description_de' => 'required|string',
            'description_hu' => 'required|string',
            'button_type' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $raffleRule = RaffleRules::findOrFail($id);
        if ($request->hasFile('image')) {
            $image_path = Helper::fileUpload($request->file('image'), 'raffle-rules', time().'_'.Str::uuid());
            Helper::deleteFile(public_path($raffleRule->image));
        } else {
            $image_path = $raffleRule->image;
        }

        $raffleRule->title_en = $request->title_en;
        $raffleRule->title_de = $request->title_de;
        $raffleRule->title_hu = $request->title_hu;
        $raffleRule->description_en = $request->description_en;
        $raffleRule->description_de = $request->description_de;
        $raffleRule->description_hu = $request->description_hu;
        $raffleRule->button_type = $request->button_type;
        $raffleRule->image = $image_path;
        $raffleRule->save();

        flash()->addSuccess('Raffle rule has been updated');

        return redirect()->route('admin.cms.raffle-rules.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $raffle_rule = RaffleRules::findOrFail($id);
        Helper::deleteFile(public_path($raffle_rule->image));
        $raffle_rule->delete();
        flash()->addSuccess('Raffle Rule Deleted Successfully.');

        return redirect()->route('admin.cms.raffle-rules.index');
    }

    public function orderUpdate(Request $request)
    {

        if ($request->has('ids')) {
            $arr = explode(',', $request->input('ids'));

            foreach ($arr as $sortOrder => $id) {
                $raffle_rule = RaffleRules::findOrFail($id);
                $raffle_rule->sort_id = $sortOrder;
                $raffle_rule->save();
            }
            $raffleRules = RaffleRules::orderBy('sort_id', 'asc')->paginate(20);

            return view('admin.layouts.cms.pages.raffle-rules.list', compact('raffleRules'));
        }
    }
}
