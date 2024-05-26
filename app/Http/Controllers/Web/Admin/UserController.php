<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('admin.layouts.users.index');
    }

    public function show()
    {
        return view('admin.layouts.users.show');
    }
}
