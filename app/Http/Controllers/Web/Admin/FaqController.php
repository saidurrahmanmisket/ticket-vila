<?php

namespace App\Http\Controllers\Web\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $faqs = FAQ::paginate(20);
            return view('admin.layouts.faq.index', compact('faqs'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        try {

            FAQ::create([
                'question' => $request->question,
                'answer' => $request->answer,
            ]);
            flash()->addSuccess('faq Created Successfully.');
            return redirect()->route('admin.faq.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with(['error' => 'An error occurred' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $faq = FAQ::findOrFail($id);

        // return view('admin.layouts.faq.edit', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faq = FAQ::findOrFail($id);

        return view('admin.layouts.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);


        $faq = FAQ::findOrFail($id);


        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        flash()->addSuccess("Updated Successfully.");

        return redirect()->route('admin.faq.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = FAQ::findOrFail($id);
        Helper::deleteFile(public_path($faq->image));
        $faq->delete();


        flash()->addSuccess("Deleted Successfully.");
        return redirect()->route('admin.faq.index');
    }
}
