<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->withCount(['tickets'])->paginate(20);

        return view('admin.layouts.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::withCount('tickets')->findOrFail($id);
        $orders = Order::where('user_id', $user->id)->with(['campaign', 'user'])->paginate(10);
        $totalSpent = Order::where('user_id', $user->id)->where('payment_status', 'completed')->sum('total_price');

        return view('admin.layouts.users.show', compact('user', 'orders', 'totalSpent'));
    }
}
