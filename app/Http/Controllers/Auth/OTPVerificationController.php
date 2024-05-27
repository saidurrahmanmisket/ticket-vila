<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

        flash()->addSuccess('We Sent 6 Digit Code in your Mail');
        return view('auth.verify_otp', ['email' => $email]);
    }

    public function verify(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'otp1' => 'required|digits:1',
            'otp2' => 'required|digits:1',
            'otp3' => 'required|digits:1',
            'otp4' => 'required|digits:1',
            'otp5' => 'required|digits:1',
            'otp6' => 'required|digits:1',
        ], [
            'otp1.required' => 'OTP 1 is required.',
            'otp2.required' => 'OTP 2 is required.',
            'otp3.required' => 'OTP 3 is required.',
            'otp4.required' => 'OTP 4 is required.',
            'otp5.required' => 'OTP 5 is required.',
            'otp6.required' => 'OTP 6 is required.',
        ]);

        $makeOtp = $request->input('otp1') . $request->input('otp2') . $request->input('otp3') . $request->input('otp4') . $request->input('otp5') . $request->input('otp6');

        $otp = OTP::where('otp', $makeOtp)->first();
        // dd(o)
        if (!$otp || $otp->user->email !== $request->input('email')) {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }

        $user = User::where('email', $request->input('email'))->first();
        $user->email_verified_at = now();
        $user->save();

        Auth::login($user);

        // Delete the used OTP
        $otp->delete();
        flash()->addSuccess('Email verified');
        return redirect()->route('user.dashboard');
    }
}
