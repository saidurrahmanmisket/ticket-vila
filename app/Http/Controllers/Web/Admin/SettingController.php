<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.layouts.settings.index');
    }

    public function help()
    {
        $users = User::latest()->withCount(['tickets'])->paginate(20);

        return view('admin.layouts.help-center.index', compact('users'));
    }

    public function show()
    {

    }
}
