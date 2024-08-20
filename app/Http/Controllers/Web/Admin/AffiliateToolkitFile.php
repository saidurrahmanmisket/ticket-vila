<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\AffiliateFile;
use Illuminate\Http\Request;

class AffiliateToolkitFile extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //permission check
        if (! has_permission('affiliate manage file')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $toolkitFiles = AffiliateFile::paginate(20);

        return view('admin.layouts.affiliate-toolkit-file.index', compact('toolkitFiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //permission check
        if (! has_permission('affiliate manage file')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        return view('admin.layouts.affiliate-toolkit-file.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //permission check
        if (! has_permission('affiliate manage file')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        // Validate form data
        $validatedData = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_de' => 'required|string|max:255',
            'title_hu' => 'required|string|max:255',
            'file_type' => 'required|string|in:video,image,text',
            'file' => 'required|file|max:10240',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,mp4,mov,avi,txt,pdf,doc,docx|max:10240',
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $filePath = Helper::fileUpload($request->file('file'), 'affiliate/toolkit/file', getFileName($request->file('file')));
        }

        // Handle icon upload
        if ($request->hasFile('icon')) {
            $iconPath = Helper::fileUpload($request->file('icon'), 'affiliate/toolkit/icon', getFileName($request->file('icon')));
        }

        // Create a new AffiliateToolkit entry
        AffiliateFile::create([
            'title_en' => $validatedData['title_en'],
            'title_de' => $validatedData['title_de'],
            'title_hu' => $validatedData['title_hu'],
            'file_type' => $validatedData['file_type'],
            'file' => $filePath ?? 'uploads/affiliate/toolkit/file/default.png',
            'icon' => $iconPath ?? 'uploads/affiliate/toolkit/icon/default.png',
        ]);

        flash()->addSuccess('Affiliate Toolkit created successfully!');

        return redirect()->route('admin.affiliate-toolkit.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AffiliateFile $affiliateToolkit)
    {
        //permission check
        if (! has_permission('affiliate manage file')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        return view('admin.layouts.affiliate-toolkit-file.edit', compact('affiliateToolkit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AffiliateFile $affiliateToolkit)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_de' => 'required|string|max:255',
            'title_hu' => 'required|string|max:255',
            'file_type' => 'required|string|in:video,image,text',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi,txt,pdf,doc,docx|max:10240',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload (file)
        if ($request->hasFile('file')) {
            $filePath = Helper::fileUpload($request->file('file'), 'affiliate/toolkit/file', getFileName($request->file('file')));
            Helper::deleteFile(public_path($affiliateToolkit->file));
        } else {
            $filePath = $affiliateToolkit->file; // Keep the old file
        }

        // Handle icon upload
        if ($request->hasFile('icon')) {
            $iconPath = Helper::fileUpload($request->file('icon'), 'affiliate/toolkit/icon', getFileName($request->file('icon')));
            Helper::deleteFile(public_path($affiliateToolkit->icon));
        } else {
            $iconPath = $affiliateToolkit->icon; // Keep the old icon
        }

        // Update the affiliate toolkit
        $affiliateToolkit->update([
            'title_en' => $validatedData['title_en'],
            'title_de' => $validatedData['title_de'],
            'title_hu' => $validatedData['title_hu'],
            'file_type' => $validatedData['file_type'],
            'file' => $filePath,
            'icon' => $iconPath,
        ]);

        flash()->addSuccess('Affiliate Toolkit updated successfully!');

        return redirect()->route('admin.affiliate-toolkit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //permission check
        if (! has_permission('affiliate manage file')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $affiliateFile = AffiliateFile::findOrFail($id);
        if (empty($affiliateFile)) {
            flash()->addError('Affiliate toolkit fail not found.');

            return redirect()->back();
        }
        Helper::deleteFile(public_path($affiliateFile->file));
        Helper::deleteFile(public_path($affiliateFile->icon));
        $affiliateFile->delete();
        flash()->addSuccess('Affiliate toolkit file deleted successfully.');

        return redirect()->route('admin.affiliate-toolkit.index');
    }

    public function status(string $id)
    {
        //permission check
        if (! has_permission('affiliate manage file')) {
            return response()->json([
                'success' => false,
                'message' => 'Permission denied: You do not have permission access this page',

            ]);
        }
        try {
            $affiliate_file = AffiliateFile::findOrFail($id);
            if (empty($affiliate_file)) {
                abort('404', 'Not found.');
            }
            if ($affiliate_file->status == Status::ACTIVE) {
                $affiliate_file->status = Status::INACTIVE;
            } else {
                $affiliate_file->status = Status::ACTIVE;
            }
            $affiliate_file->save();

            return response()->json([
                'success' => true,
                'message' => 'Affiliate toolkit status has been updated successfully.',
                'data' => $affiliate_file,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!',
            ]);
        }
    }

    public function download(AffiliateFile $affiliateFile)
    {
        return response()->download(public_path($affiliateFile->file));
    }
}
