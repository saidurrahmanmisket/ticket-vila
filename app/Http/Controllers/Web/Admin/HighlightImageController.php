<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Gift;
use App\Models\HighlightImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HighlightImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //permission check
        if (! has_permission('gift menu')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $gifts = Gift::all();
        $highlightImage = HighlightImage::when($request->gift, function ($query, $value) {
            $query->where('gift_id', $value);
        })->with('gift')->paginate();

        return view('admin.layouts.highlight-image.index', compact('highlightImage', 'gifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //permission check
        if (! has_permission('gift create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $gifts = Gift::all();

        return view('admin.layouts.highlight-image.create', compact('gifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //permission check
        if (! has_permission('gift create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $validatedData = $request->validate([
            'image' => 'required|max:5120|mimes:jpg,png,svg,gif',
            'gift_id' => 'required|integer',
        ], [
            'gift_id.required' => 'Please Select a gift',
            'gift_id.integer' => 'Please Select a valid gift',
        ]);

        try {
            if ($request->has('image')) {
                $file = $request->file('image');
                $validatedData['file_path'] = Helper::fileUpload($file, 'highlight-image', time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                HighlightImage::create([
                    'image' => $validatedData['file_path'],
                    'gift_id' => $validatedData['gift_id'],
                ]);
            }

            return redirect()->route('admin.highlight-image.index')->with('success', 'Highlight Image created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HighlightImage $highlightImage)
    {
        //permission check
        if (! has_permission('gift edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $gifts = Gift::all();

        return view('admin.layouts.highlight-image.edit', compact('gifts', 'highlightImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HighlightImage $highlightImage)
    {
        //permission check
        if (! has_permission('gift edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $validatedData = $request->validate([
            'image' => 'nullable|max:5120|mimes:jpg,png,svg,gif',
            'gift_id' => 'required|integer',
        ], [
            'gift_id.required' => 'Please Select a gift',
            'gift_id.integer' => 'Please Select a valid gift',
        ]);

        try {

            if ($request->has('image')) {
                $file = $request->file('image');
                $validatedData['file_path'] = Helper::fileUpload($file, 'highlight-image', time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                Helper::deleteFile(public_path($highlightImage->image));
            } else {
                $validatedData['file_path'] = $highlightImage->image;
            }

            $highlightImage->update([
                'image' => $validatedData['file_path'],
                'gift_id' => $validatedData['gift_id'],
            ]);

            return redirect()->route('admin.highlight-image.index')->with('success', 'Highlight Image updated successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HighlightImage $highlightImage)
    {
        //permission check
        if (! has_permission('gift delete')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        try {

            $highlightImage->delete();

            return redirect()->route('admin.highlight-image.index')->with('success', 'Highlight Image deleted successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function status($id)
    {
        //permission check
        if (! has_permission('gift status')) {
            return response()->json([
                'success' => true,
                'message' => 'Permission denied: You do not have permission access this page',
            ]);
        }
        try {

            $highlightImage = HighlightImage::findOrFail($id);

            if ($highlightImage->status == Status::ACTIVE) {
                $highlightImage->status = Status::INACTIVE;
            } else {
                $highlightImage->status = Status::ACTIVE;
            }
            $highlightImage->save();

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully',
                'data' => $highlightImage,
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);

        }
    }
}
