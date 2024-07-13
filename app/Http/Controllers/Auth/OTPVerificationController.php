<?php

namespace App\Http\Controllers\Auth;

use App\Enums\NotificationType;
use App\Http\Controllers\Controller;
use App\Models\OTP;
use App\Models\User;
use App\Notifications\NewNotification;
use Illuminate\Http\Request;

class OTPVerificationController extends Controller
{
    public function showVerificationForm()
    {
        if (! auth()->check() || auth()->user()->hasVerifiedEmail()) {
            return redirect()->route('frontend.home');
        }

        flash()->addSuccess('We Sent 6 Digit Code in your Mail');

        return view('auth.verify_otp');
    }

    public function verify(Request $request)
    {
        $makeOtp = $request->input('otp1').$request->input('otp2').$request->input('otp3').$request->input('otp4').$request->input('otp5').$request->input('otp6');
        $request->merge(['otp' => $makeOtp]);

        $request->validate([
            'otp' => 'required|digits:6',
        ]);
        try {
            $otp = OTP::where('otp', $request->otp)->first();
            // dd(o)
            if (! $otp || $otp->user->email !== $request->input('email')) {
                return back()->withErrors(['otp' => 'Invalid OTP.']);
            }

            $user = User::where('email', $request->input('email'))->first();
            $user->email_verified_at = now();
            $user->save();
            //                for make notifications
            $user = \Auth::user();
            $user->notify(new NewNotification(
                subject: 'Registration Complete',
                message: 'Welcome to TicketVilla, Thank you for registering',
                actionText: 'Dashboard',
                actionUrl: '/',
                channels: ['mail', 'database'],
                type: NotificationType::REGISTRATION
            ));
            $admin = User::where('role', 'admin')->first();
            $admin->notify(new NewNotification(
                subject: 'New Registration',
                message: $user->first_name.' '.$user->last_name.' registered now!',
                actionText: 'See user Details',
                actionUrl: route('admin.user.show', $user->id),
                channels: ['mail', 'database'],
                type: NotificationType::REGISTRATION
            ));

            // Delete the used OTP
            $otp->delete();
            flash()->addSuccess('Email verified');

            return redirect()->route('user.dashboard');
        } catch (\Exception $e) {
            flash()->addError($e->getMessage());

            return redirect()->back();
        }
    }
}
