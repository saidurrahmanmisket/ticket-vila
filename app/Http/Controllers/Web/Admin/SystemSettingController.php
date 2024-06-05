<?php

namespace App\Http\Controllers\Web\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SystemSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $system = SystemSetting::first();
            return view('admin.layouts.settings.system-setting', compact('system'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'system_name' => 'required|string',
            'copy_rights_text' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string',
            'address' => 'required|string',
            'company_open_hour' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ],
            [
                'logo.max' => 'Maximum upload file size 2MB',
                'favicon.max' => 'Maximum upload file size 1MB',
            ]
        );

        $system = SystemSetting::first();
        // for logo
        $logo = $request->file('logo');
        if ($logo) {
            $logo_path = Helper::fileUpload($logo, '/system/', time() . '_' . pathinfo($logo->getClientOriginalName(), PATHINFO_FILENAME));
            if (isset($system->logo)) {
                Helper::deleteFile(public_path($system->logo));
            }
        } else {
            $logo_path = $system->logo;
        }

        // for favicon
        $favicon = $request->file('favicon');
        if ($favicon) {
            $favicon_path = Helper::fileUpload($favicon, '/system/', time() . '_' . pathinfo($favicon->getClientOriginalName(), PATHINFO_FILENAME));
            if (isset($system->favicon)) {
                Helper::deleteFile(public_path($system->favicon));
            }
        } else {
            $favicon_path = $system->favicon;
        }

        if ($system) {
            // Update existing system setting
            $system->update([
                'system_name' => $request->system_name,
                'copy_rights_text' => $request->copy_rights_text,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'address' => $request->address,
                'company_open_hour' => $request->company_open_hour,
                'logo' => $logo_path,
                'favicon' => $favicon_path,
            ]);
        } else {
            // Create new system setting
            SystemSetting::create([
                'system_name' => $request->system_name,
                'copy_rights_text' => $request->copy_rights_text,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'address' => $request->address,
                'company_open_hour' => $request->company_open_hour,
                'logo' => $logo_path,
                'favicon' => $favicon_path,
            ]);
        }

        flash()->addSuccess("Updated Successfully.");

        return redirect()->route('admin.system-setting.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
