<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public  function index()
    {
        $chats = Chat::paginate(20)->get();
        return view('admin.layouts.help-center.index', compact('chats'));
    }
}
