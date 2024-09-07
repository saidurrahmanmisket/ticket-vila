<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        //permission check
        if (! has_permission('user menu')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $users = User::when($request->search, function ($query, $value) {
            $query->where(function ($q) use ($value) {
                $q->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$value}%"])
                    ->orWhere('email', 'like', '%'.$value.'%');
            });
        })->latest()->withCount(['tickets'])->paginate(20);

        return view('admin.layouts.users.index', compact('users'));
    }

    public function show($id)
    {
        //permission check
        if (! has_permission('user view')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $user = User::withCount('tickets')->findOrFail($id);
        $orders = Order::where('user_id', $user->id)->with(['campaign', 'user'])->paginate(10);
        $totalSpent = Order::where('user_id', $user->id)->where('payment_status', 'completed')->sum('total_price');

        return view('admin.layouts.users.show', compact('user', 'orders', 'totalSpent'));
    }
}
