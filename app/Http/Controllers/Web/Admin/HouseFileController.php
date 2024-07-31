<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Gift;
use App\Models\HouseFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HouseFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //permission check
        if (! has_permission('house file menu')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $houseFiles = HouseFile::with('gift')->paginate();

        return view('admin.layouts.house-file.index', compact('houseFiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //permission check
        if (! has_permission('house file create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $gifts = Gift::all();

        return view('admin.layouts.house-file.create', compact('gifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //permission check
        if (! has_permission('house file create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $validatedData = $request->validate([
            'file_name_en' => 'required|string|max:255',
            'file_name_de' => 'required|string|max:255',
            'file_name_hu' => 'required|string|max:255',
            'file' => 'required|max:20480',
            'gift_id' => 'required|integer',
        ], [
            'gift_id.required' => 'Please Select a gift',
            'gift_id.integer' => 'Please Select a valid gift',
        ]);

        try {
            if ($request->has('file')) {
                $file = $request->file('file');
                $validatedData['file_path'] = Helper::fileUpload($file, 'house-file', time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                HouseFile::create([
                    'file_name_en' => $validatedData['file_name_en'],
                    'file_name_de' => $validatedData['file_name_de'],
                    'file_name_hu' => $validatedData['file_name_hu'],
                    'file_path' => $validatedData['file_path'],
                    'gift_id' => $validatedData['gift_id'],
                ]);
            }

            return redirect()->route('admin.house-files.index')->with('success', 'House File created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HouseFile $houseFile)
    {
        //permission check
        if (! has_permission('house file edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $gifts = Gift::all();

        return view('admin.layouts.house-file.edit', compact('gifts', 'houseFile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HouseFile $houseFile)
    {
        //permission check
        if (! has_permission('house file update')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $validatedData = $request->validate([
            'file_name_en' => 'required|string|max:255',
            'file_name_de' => 'required|string|max:255',
            'file_name_hu' => 'required|string|max:255',
            'file' => 'nullable|max:20480',
            'gift_id' => 'required|integer',
        ], [
            'gift_id.required' => 'Please Select a gift',
            'gift_id.integer' => 'Please Select a valid gift',
        ]);

        try {

            if ($request->has('file')) {
                $file = $request->file('file');
                $validatedData['file_path'] = Helper::fileUpload($file, 'house-file', time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                Helper::deleteFile(public_path($houseFile->file_path));
            } else {
                $validatedData['file_path'] = $houseFile->file_path;
            }

            $houseFile->update([
                'file_name_en' => $validatedData['file_name_en'],
                'file_name_de' => $validatedData['file_name_de'],
                'file_name_hu' => $validatedData['file_name_hu'],
                'file_path' => $validatedData['file_path'],
                'gift_id' => $validatedData['gift_id'],
            ]);

            return redirect()->route('admin.house-files.index')->with('success', 'House File updated successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HouseFile $houseFile)
    {
        //permission check
        if (! has_permission('house file delete')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        try {

            $houseFile->delete();

            return redirect()->route('admin.house-files.index')->with('success', 'House file deleted successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function status($id)
    {
        //permission check
        if (! has_permission('house file status')) {
            return response()->json([
                'success' => false,
                'message' => 'Permission denied: You do not have permission access this page',
            ]);
        }
        try {

            $houseFile = HouseFile::findOrFail($id);

            if ($houseFile->status == Status::ACTIVE) {
                $houseFile->status = Status::INACTIVE;
            } else {
                $houseFile->status = Status::ACTIVE;
            }
            $houseFile->save();

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully',
                'data' => $houseFile,
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
