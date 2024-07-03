<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::paginate();

        return view('admin.layouts.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.news.create');
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
            'description_en' => 'nullable|string',
            'description_de' => 'nullable|string',
            'description_hu' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);
        try {

            // Handle the file upload if there is one
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imagePath = Helper::fileUpload($file, 'news', time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            } else {
                $imagePath = null;
            }

            // Create the dynamic page
            News::create([
                'user_id' => Auth::user()->id,
                'title_en' => $request->title_en,
                'title_de' => $request->title_de,
                'title_hu' => $request->title_hu,
                'description_en' => $request->description_en,
                'description_de' => $request->description_de,
                'description_hu' => $request->description_hu,
                'image' => $imagePath,
            ]);

            // Redirect back with a success message
            return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

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
    public function edit(string $id)
    {
        $news = News::findOrFail($id);

        return view('admin.layouts.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        // Validate the request data
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_de' => 'required|string|max:255',
            'title_hu' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_de' => 'nullable|string',
            'description_hu' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);
        try {

            // Handle the file upload if there is one
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imagePath = Helper::fileUpload($file, 'news', time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                Helper::deleteFile(public_path($news->image));
            } else {
                $imagePath = $news->image;
            }

            // update the news
            $news->update([
                'user_id' => Auth::user()->id,
                'title_en' => $request->title_en,
                'title_de' => $request->title_de,
                'title_hu' => $request->title_hu,
                'description_en' => $request->description_en,
                'description_de' => $request->description_de,
                'description_hu' => $request->description_hu,
                'image' => $imagePath,
            ]);

            // Redirect back with a success message
            return redirect()->route('admin.news.index')->with('success', 'News Update successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        Helper::deleteFile(public_path($news->image));
        $news->delete();

        flash()->addSuccess('Deleted Successfully.');

        return redirect()->route('admin.news.index');
    }

    public function status($id)
    {
        $news = News::findOrFail($id);
        if ($news->status == Status::ACTIVE) {
            $news->status = Status::INACTIVE;
        } else {
            $news->status = Status::ACTIVE;
        }
        $news->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'data' => $news,
        ]);
    }
}
