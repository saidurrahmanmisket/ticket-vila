<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        try {

            $today = Carbon::today();
            $notifications = Auth::user()->notifications;
            $unreadNotifications = Auth::user()->unreadNotifications;
            $newNotification = Auth::user()->notifications()
                ->whereDate('created_at', $today)
                ->get();

            return view('admin.layouts.notification.index', compact('notifications', 'unreadNotifications', 'newNotification'));

        } catch (\Exception $e) {
            flash()->addError($e->getMessage());

            return redirect()->back();
        }
    }

    public function markAllAsRead()
    {
        try {

            Auth::user()->unreadNotifications->markAsRead();

            return redirect()->route('admin.notifications.index');

        } catch (\Exception $e) {
            flash()->addError($e->getMessage());

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {

            $notification = Auth::user()->notifications()->find($id);

            if ($notification) {
                $notification->delete();
            }

            flash()->addSuccess('Notification deleted successfully');

            return redirect()->route('admin.notifications.index');
        } catch (\Exception $e) {
            flash()->addError($e->getMessage());

            return redirect()->back();
        }
    }
}
