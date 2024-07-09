<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\EbookDescription;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EbookDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ebookDescription = EbookDescription::with('campaign')->paginate();

        return view('admin.layouts.cms.ebook-description.index', compact('ebookDescription'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $campaigns = Campaign::where('status', Status::PUBLISHED)->get();
        return view('admin.layouts.cms.ebook-description.create', compact('campaigns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'campaign' => 'required',
            'description_en' => 'required|string',
            'description_de' => 'required|string',
            'description_hu' => 'required|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Check if ebook description already exists for this campaign and is active
        $isExist = EbookDescription::where('campaign_id', $request->campaign)->where('status', Status::ACTIVE)->get();
        if ($isExist->count() > 0) {
            return redirect()->back()->with('error', 'Ebook description already Active for this campaign.');
        }

        try {
            EbookDescription::create([
                'campaign_id' => $request->campaign,
                'description_en' => $request->description_en,
                'description_de' => $request->description_de,
                'description_hu' => $request->description_hu,
            ]);

            // Redirect to a success page
            return redirect()->route('admin.cms.ebook-description.index')->with('success', 'Ebook description saved successfully!');
        } catch (\Exception $e) {
            // Handle any errors that occur during the save process
            return redirect()->back()->with('error', $e->getMessage());
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
    public function edit($id)
    {
        try {
            // Fetch the EbookDescription by id
            $ebookDescription = EbookDescription::findOrFail($id);
            $campaign = Campaign::where('id', $ebookDescription->campaign_id )->first();
            // Return the edit view with the EbookDescription data
            return view('admin.layouts.cms.ebook-description.edit', compact('ebookDescription','campaign' ));
        } catch (\Exception $e) {
            // Handle any errors that occur during the fetch process
            return redirect()->route('admin.cms.ebook-description.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'description_en' => 'required|string',
            'description_de' => 'required|string',
            'description_hu' => 'required|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Find the EbookDescription by id
            $ebookDescription = EbookDescription::findOrFail($id);

            // Check if ebook description already exists for this campaign and is active
            $isExist = EbookDescription::where('campaign_id', $request->campaign)->where('status', Status::ACTIVE)->get();
            if ($isExist->count() > 0) {
                return redirect()->back()->with('error', 'Ebook description already Active for this campaign.');
            }
            // Update the EbookDescription
            $ebookDescription->update([
                'description_en' => $request->description_en,
                'description_de' => $request->description_de,
                'description_hu' => $request->description_hu,
            ]);

            // Redirect to a success page
            return redirect()->route('admin.cms.ebook-description.index')->with('success', 'Ebook description updated successfully!');
        } catch (\Exception $e) {
            // Handle any errors that occur during the update process
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Find the EbookDescription by id
            $ebookDescription = EbookDescription::findOrFail($id);

            // Delete the EbookDescription
            $ebookDescription->delete();

            // Redirect to a success page
            return redirect()->route('admin.cms.ebook-description.index')->with('success', 'Ebook description deleted successfully!');
        } catch (\Exception $e) {
            // Handle any errors that occur during the delete process
            return redirect()->route('admin.cms.ebook-description.index')->with('error', $e->getMessage());
        }
    }


    public function status(Request $request, $id)
    {
        try {
            $ebookDescription = EbookDescription::findOrFail($id);

            if ($ebookDescription->status == Status::ACTIVE) {
                $ebookDescription->status = Status::INACTIVE;
            } else {
                $ebookDescription->status = Status::ACTIVE;
            }
            $ebookDescription->save();

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully',
                'data' => $ebookDescription,
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
               'success' => false,
               'message' => $e->getMessage(),
            ]);
        }
    }
}
