<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    public function index()
    {
        $payment_count = Order::where('payment_status', Status::COMPLETED)->count();
        $total_users_count = User::where('role', 'user')->count();
        $today_users_count = User::whereDate('created_at', Carbon::today())->count();

        $usersInfo = [
            'payment_count' => $payment_count,
            'total_users_count' => $total_users_count,
            'today_users_count' => $today_users_count,
        ];

        return view('admin.layouts.statistics.index', compact('usersInfo'));
    }
}
