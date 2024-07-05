<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.layouts.settings.index');
    }

    public function help()
    {
        return view('admin.layouts.help-center.index');
    }
}
