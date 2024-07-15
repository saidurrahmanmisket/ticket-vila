<?php

namespace App\Traits;

use App\Enums\NotificationType;
use App\Models\User;
use App\Notifications\NewNotification;

trait Notification
{
    public function sendRegistrationNotification($user): void
    {
        $user->notify(new NewNotification(
            subject: 'Registration Complete',
            message: 'Welcome to TicketVilla, Thank you for registering',
            actionText: 'Dashboard',
            actionUrl: '/',
            channels: ['mail', 'database'],
            type: NotificationType::REGISTRATION
        ));
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewNotification(
                subject: 'New Registration',
                message: $user->first_name.' '.$user->last_name.' registered now!',
                actionText: 'See user Details',
                actionUrl: route('admin.user.show', $user->id),
                channels: ['database'],
                type: NotificationType::REGISTRATION
            ));
        }
    }
}
