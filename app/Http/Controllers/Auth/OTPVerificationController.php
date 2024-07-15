<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOTP;
use App\Models\OTP;
use App\Traits\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OTPVerificationController extends Controller
{
    use Notification;

    public function showVerificationForm()
    {
        if (! auth()->check() || auth()->user()->hasVerifiedEmail()) {
            return redirect()->route('frontend.home');
        }

        return view('auth.verify_otp');
    }

    public function verify(Request $request)
    {
        if (! auth()->check() || auth()->user()->hasVerifiedEmail()) {
            return redirect()->route('frontend.home');
        }
        $makeOtp = $request->input('otp1').$request->input('otp2').$request->input('otp3').$request->input('otp4').$request->input('otp5').$request->input('otp6');
        $request->merge(['otp' => $makeOtp]);

        $request->validate([
            'otp' => 'required|digits:6|exists:otps,otp',
        ], [
            'otp.exists' => 'Invalid OTP.',
        ]);
        try {
            $otp = OTP::where('otp', $request->otp)->latest()->first();
            //check otp expire time
            $user = auth()->user();
            $otpCreationTime = Carbon::parse($otp->created_at);
            $otpExpiryTime = $otpCreationTime->addMinutes(10);
            if (! $otp || $otp->user->email !== $user->email) {
                return back()->withErrors(['otp' => 'Invalid OTP.']);
            } elseif (! Carbon::now()->lessThanOrEqualTo($otpExpiryTime)) {
                $otp->delete();

                return back()->withErrors(['otp' => 'OTP is expired.']);
            }
            $user->email_verified_at = now();
            $user->save();
            //send registration notification
            $this->sendRegistrationNotification($user);
            // Delete the used OTP
            $otp->delete();
            flash()->addSuccess('Email verified');

            return redirect()->route('user.dashboard');
        } catch (\Exception $e) {
            flash()->addError($e->getMessage());

            return redirect()->back();
        }
    }

    public function resend()
    {
        if (! \Auth::check() || \Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('frontend.home');
        }
        try {
            OTP::where('user_id', \Auth::id())->delete();
            $otp = generateOTP();
            OTP::create([
                'user_id' => \Auth::id(),
                'otp' => $otp,
            ]);

            // Send OTP to the user's email
            Mail::to(auth()->user()->email)->send(new SendOTP($otp));
            flash()->addSuccess('We Sent 6 Digit Code in your Mail');

            return redirect()->back();
        } catch (\Exception $exception) {
            flash()->addError('Fail to send otp.');

            return redirect()->back();
        }
    }
}
