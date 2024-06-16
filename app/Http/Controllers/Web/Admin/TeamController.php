<?php

namespace App\Http\Controllers\Web\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $teams = Team::paginate(20);
            return view('admin.layouts.team.index', compact('teams'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with(['error' => 'An error occurred' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
            [
                'image.max' => 'Maximum upload file size 2MB',
            ]
        );

        $file = $request->file('image');
        $image_path = Helper::fileUpload($file, 'teams', time() . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));

        Team::create([
            'name' => $request->name,
            'position' => $request->position,
            'image' => $image_path,
        ]);

        flash()->addSuccess("Created Successfully.");

        return redirect()->route('admin.team.index');
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
        $team = Team::findOrFail($id);

        return view('admin.layouts.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
            [
                'image.max'=>'Maximum upload file size 2MB',
            ]
        );

        $team = Team::findOrFail($id);
        $file = $request->file('image');
        if ($file) {
            $image_path = Helper::fileUpload($file,'/gifts/',time().'_'.pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME));
            Helper::deleteFile(public_path($team->image));
        }else{
            $image_path = $team->image;
        }


        $team->update([
            'name' => $request->name,
            'position' => $request->position,
            'image' => $image_path,
        ]);

        flash()->addSuccess("Updated Successfully.");

        return redirect()->route('admin.team.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        Helper::deleteFile(public_path($team->image));
        $team->delete();


        flash()->addSuccess("Deleted Successfully.");
        return redirect()->route('admin.team.index');
    }
}
