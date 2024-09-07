<?php

namespace App\Http\Controllers\Web\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //permission check
        if (! has_permission('social media settings')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $socials = SocialMedia::when($request->search, function ($query, $value) {
            $query->where('name', 'like', '%'.$value.'%');
        })->paginate(10);

        return view('admin.layouts.social.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //permission check
        if (! has_permission('social media settings')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        return view('admin.layouts.social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //permission check
        if (! has_permission('social media settings')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $request->validate([
            'name' => 'required|string',
            'link' => 'required|string',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ],
            [
                'icon.max' => 'Maximum upload file size 1MB',
            ]
        );

        $file = $request->file('icon');
        if ($file) {
            $image_path = Helper::fileUpload($file, '/socials/', time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        } else {
            $image_path = null;
        }

        SocialMedia::create([
            'name' => $request->name,
            'link' => $request->link,
            'icon' => $image_path,
        ]);

        flash()->addSuccess('  Created Successfully.');

        return redirect()->route('admin.settings.social-media.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //permission check
        if (! has_permission('social media settings')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $social = SocialMedia::findOrFail($id);

        return view('admin.layouts.social.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //permission check
        if (! has_permission('social media settings')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        try {
            $request->validate([
                'name' => 'required|string',
                'link' => 'required|string',
                'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ],
                [
                    'icon.max' => 'Maximum upload file size 1MB',
                ]
            );

            $social = SocialMedia::findOrFail($id);
            $file = $request->file('icon');
            if ($file) {
                $image_path = Helper::fileUpload($file, '/socials/', time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                Helper::deleteFile(public_path($social->icon));
            } else {
                $image_path = $social->icon;
            }

            $social->update([
                'name' => $request->name,
                'link' => $request->link,
                'icon' => $image_path,
            ]);

            flash()->addSuccess('  Updated Successfully.');

            return redirect()->route('admin.settings.social-media.index');
        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage());

            return redirect()->route('admin.settings.social-media.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //permission check
        if (! has_permission('social media settings')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $social = SocialMedia::findOrFail($id);
        Helper::deleteFile(public_path($social->icon));
        $social->delete();

        flash()->addSuccess('  Deleted Successfully.');

        return redirect()->route('admin.settings.social-media.index');
    }
}
