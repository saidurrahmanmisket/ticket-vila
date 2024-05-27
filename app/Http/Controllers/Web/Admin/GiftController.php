<?php

namespace App\Http\Controllers\Web\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gifts = Gift::paginate(20);
        return view('admin.layouts.gift.index', compact('gifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.gift.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
            [
                'image.max'=>'Maximum upload file size 2MB',
            ]
        );

        $file = $request->file('image');
        $image_path = Helper::fileUpload($file,'/gifts/',time().'_'.pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME));

        Gift::create([
            'name' => $request->name,
            'image' => $image_path,
        ]);

        flash()->addSuccess("Gift Created Successfully.");

        return redirect()->route('admin.gift.index');
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
        $gift = Gift::findOrFail($id);

        return view('admin.layouts.gift.edit', compact('gift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
            [
                'image.max'=>'Maximum upload file size 2MB',
            ]
        );

        $gift = Gift::findOrFail($id);
        $file = $request->file('image');
        if ($file) {
            $image_path = Helper::fileUpload($file,'/gifts/',time().'_'.pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME));
            Helper::deleteFile(public_path($gift->image));
        }else{
            $image_path = $gift->image;
        }


        $gift->update([
            'name' => $request->name,
            'image' => $image_path,
        ]);

        flash()->addSuccess("Gift Updated Successfully.");

        return redirect()->route('admin.gift.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gift = Gift::findOrFail($id);
        Helper::deleteFile(public_path($gift->image));
        $gift->delete();


        flash()->addSuccess("Gift Deleted Successfully.");
        return redirect()->route('admin.gift.index');
    }
}
