<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        //permission check
        if (! has_permission('notification menu')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
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
        //permission check
        if (! has_permission('notification all read')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
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
        //permission check
        if (! has_permission('notification delete')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
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
