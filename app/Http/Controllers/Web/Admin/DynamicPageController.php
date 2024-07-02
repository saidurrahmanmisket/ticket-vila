<?php

namespace App\Http\Controllers\Web\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\DynamicPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DynamicPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPages = DynamicPage::paginate();

        return view('admin.layouts.dynamic-page.index', compact('allPages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.dynamic-page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_de' => 'required|string|max:255',
            'title_hu' => 'required|string|max:255',
            'sub_title_en' => 'nullable|string',
            'sub_title_de' => 'nullable|string',
            'sub_title_hu' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_de' => 'nullable|string',
            'description_hu' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload if there is one
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imagePath = Helper::fileUpload($file, 'dynamic-page', time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        } else {
            $imagePath = null;
        }

        // Create the dynamic page
        DynamicPage::create([
            'page_slug' => Str::slug($request->title_en),
            'title_en' => $request->title_en,
            'title_de' => $request->title_de,
            'title_hu' => $request->title_hu,
            'sub_title_en' => $request->sub_title_en,
            'sub_title_de' => $request->sub_title_de,
            'sub_title_hu' => $request->sub_title_hu,
            'description_en' => $request->description_en,
            'description_de' => $request->description_de,
            'description_hu' => $request->description_hu,
            'image' => $imagePath,
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.dynamic-page.index')->with('success', 'Dynamic page created successfully.');
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
    public function edit(string $id)
    {
        $dynamicPage = DynamicPage::findOrFail($id);

        return view('admin.layouts.dynamic-page.edit', compact('dynamicPage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DynamicPage $dynamicPage)
    {
        // Validate the request data
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_de' => 'required|string|max:255',
            'title_hu' => 'required|string|max:255',
            'sub_title_en' => 'nullable|string',
            'sub_title_de' => 'nullable|string',
            'sub_title_hu' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_de' => 'nullable|string',
            'description_hu' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload if there is one
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($dynamicPage->image) {
                Helper::deleteFile(public_path($dynamicPage->image));
            }
            // Store the new image
            $file = $request->file('image');
            $imagePath = Helper::fileUpload($file, 'dynamic-page', time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        } else {
            $imagePath = $dynamicPage->image;
        }

        // Update the dynamic page
        $dynamicPage->update([
            'page_slug' => Str::slug($request->title_en),
            'title_en' => $request->title_en,
            'title_de' => $request->title_de,
            'title_hu' => $request->title_hu,
            'sub_title_en' => $request->sub_title_en,
            'sub_title_de' => $request->sub_title_de,
            'sub_title_hu' => $request->sub_title_hu,
            'description_en' => $request->description_en,
            'description_de' => $request->description_de,
            'description_hu' => $request->description_hu,
            'image' => $imagePath,
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.dynamic-page.index')->with('success', 'Dynamic page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DynamicPage $dynamicPage)
    {
        Helper::deleteFile(public_path($dynamicPage->image));
        $dynamicPage->delete();

        flash()->addSuccess('Deleted Successfully.');

        return redirect()->route('admin.dynamic-page.index');
    }
}
