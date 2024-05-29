<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->withCount(['tickets'])->paginate(20);
        return view('admin.layouts.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $tickets = Ticket::latest()->with(['user','campaign','order'])->where('user_id',$id)->get();
        $totalSpent = Order::where('payment_status','completed')->sum('total_price');
        return view('admin.layouts.users.show',compact('user','tickets','totalSpent'));
    }


}
