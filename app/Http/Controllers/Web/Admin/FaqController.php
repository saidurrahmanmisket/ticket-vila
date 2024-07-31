<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
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
        //permission check
        if (! has_permission('faq menu')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        try {
            $faqs = FAQ::paginate(20);

            return view('admin.layouts.faq.index', compact('faqs'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->withErrors(['error' => 'An error occurred'.$e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //permission check
        if (! has_permission('faq create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        return view('admin.layouts.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //permission check
        if (! has_permission('faq create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $request->validate([
            'question_en' => 'required|string',
            'question_de' => 'required|string',
            'question_hu' => 'required|string',
            'answer_en' => 'required|string',
            'answer_de' => 'required|string',
            'answer_hu' => 'required|string',
        ]);

        try {

            FAQ::create([
                'question_en' => $request->question_en,
                'question_de' => $request->question_de,
                'question_hu' => $request->question_hu,
                'answer_en' => $request->answer_en,
                'answer_de' => $request->answer_de,
                'answer_hu' => $request->answer_hu,
            ]);
            flash()->addSuccess('faq Created Successfully.');

            return redirect()->route('admin.faq.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with(['error' => 'An error occurred'.$e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //permission check
        if (! has_permission('faq edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $faq = FAQ::findOrFail($id);

        return view('admin.layouts.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //permission check
        if (! has_permission('faq edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        try {
            $request->validate([
                'question_en' => 'required|string',
                'question_de' => 'required|string',
                'question_hu' => 'required|string',
                'answer_en' => 'required|string',
                'answer_de' => 'required|string',
                'answer_hu' => 'required|string',
            ]);

            $faq = FAQ::findOrFail($id);

            $faq->update([
                'question_en' => $request->question_en,
                'question_de' => $request->question_de,
                'question_hu' => $request->question_hu,
                'answer_en' => $request->answer_en,
                'answer_de' => $request->answer_de,
                'answer_hu' => $request->answer_hu,
            ]);

            flash()->addSuccess('Updated Successfully.');

            return redirect()->route('admin.faq.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with(['error' => 'An error occurred'.$e->getMessage()]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //permission check
        if (! has_permission('faq delete')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $faq = FAQ::findOrFail($id);
        Helper::deleteFile(public_path($faq->image));
        $faq->delete();

        flash()->addSuccess('Deleted Successfully.');

        return redirect()->route('admin.faq.index');
    }

    public function status($id)
    {
        //permission check
        if (! has_permission('faq status')) {
            return response()->json([
                'success' => true,
                'message' => 'Permission denied: You do not have permission access this page',
            ]);
        }
        try {
            $faq = FAQ::findOrFail($id);
            if ($faq->status == Status::ACTIVE) {
                $faq->status = Status::INACTIVE;
            } else {
                $faq->status = Status::ACTIVE;
            }
            $faq->save();

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully',
                'data' => $faq,
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
