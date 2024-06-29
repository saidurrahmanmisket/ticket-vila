<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Gift;
use App\Models\KeyFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KeyFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyFeatures = KeyFeature::paginate();

        return view('admin.layouts.key-feature.index', compact('keyFeatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gifts = Gift::all();

        return view('admin.layouts.key-feature.create', compact('gifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title_en.*' => 'required|string|max:255',
                'title_de.*' => 'required|string|max:255',
                'title_hu.*' => 'required|string|max:255',
                'icon.*' => 'required|image|max:1024',
                'gift_id' => 'required|integer',
            ], [
                'gift_id.required' => 'Please Select a gift',
                'gift_id.integer' => 'Please Select a valid gift',
            ]);

            $features = [];

            foreach ($validatedData['title_en'] as $index => $title) {
                $feature = [
                    'title_en' => $validatedData['title_en'][$index],
                    'title_de' => $validatedData['title_de'][$index],
                    'title_hu' => $validatedData['title_hu'][$index],
                    'gift_id' => $validatedData['gift_id'],
                ];

                if (isset($validatedData['icon'][$index])) {
                    $file = $validatedData['icon'][$index];
                    $icon_path = Helper::fileUpload($file, 'gifts/key-features', time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                    $feature['icon'] = $icon_path;
                }

                $features[] = $feature;
            }

            foreach ($features as $feature) {
                KeyFeature::create($feature);
            }

            return redirect()->route('admin.key-feature.index')->with('success', 'Key Features created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KeyFeature $keyFeature)
    {
        //        return view('admin.layouts.key-feature.show', compact('keyFeature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KeyFeature $keyFeature)
    {
        $gifts = Gift::all();

        return view('admin.layouts.key-feature.edit', compact('keyFeature', 'gifts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KeyFeature $keyFeature)
    {
        try {
            $validated = $request->validate([
                'title_en' => 'required|string|max:255',
                'title_de' => 'required|string|max:255',
                'title_hu' => 'required|string|max:255',
                'icon' => 'image|max:1024',
                'gift_id' => 'required|integer',
            ]);

            if (isset($validated['icon'])) {
                $file = $validated['icon'];
                $icon_path = Helper::fileUpload($file, 'gifts/key-features', time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                $validated['icon'] = $icon_path;
            }

            $keyFeature->update($validated);

            return redirect()->route('admin.key-feature.index')->with('success', 'Key Feature updated successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KeyFeature $keyFeature)
    {
        $keyFeature->delete();

        return redirect()->route('admin.key-feature.index')->with('success', 'Key Feature deleted successfully.');
    }

    public function status($id)
    {
        $keyFeature = KeyFeature::findOrFail($id);
        if ($keyFeature->status == Status::ACTIVE) {
            $keyFeature->status = Status::INACTIVE;
        } else {
            $keyFeature->status = Status::ACTIVE;
        }
        $keyFeature->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'data' => $keyFeature,
        ]);
    }
}
