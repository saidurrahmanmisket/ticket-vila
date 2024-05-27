<?php

namespace App\Http\Controllers;

use App\Models\OTP;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OTPVerificationController extends Controller
{
    public function showVerificationForm($email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return abort(404);
        }
        if ($user->hasVerifiedEmail($email)) {
            return redirect()->route('frontend.home');
        }

        return view('auth.verify_otp', ['email' => $email]);
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|digits:6',
        ]);

        $otp = OTP::where('otp', $request->otp)->first();

        if (!$otp || $otp->user->email !== $request->input('email')) {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }

        $user = User::where('email', $request->input('email'))->first();
        $user->email_verified_at = now();
        $user->save();

        Auth::login($user);

        // Delete the used OTP
        $otp->delete();

        return redirect()->route('user.dashboard');
    }
}
