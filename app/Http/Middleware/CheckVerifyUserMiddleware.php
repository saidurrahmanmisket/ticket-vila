<?php

namespace App\Http\Middleware;

use App\Mail\SendOTP;
use App\Models\OTP;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class CheckVerifyUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! empty(Auth::user()->email_verified_at)) {
            return $next($request);
        } else {
            $existOTP = OTP::where('user_id', Auth::id())->latest()->first();
            $otpCreationTime = Carbon::parse($existOTP->created_at);
            $otpExpiryTime = $otpCreationTime->addMinutes(10);
            if (! Carbon::now()->lessThanOrEqualTo($otpExpiryTime)) {
                OTP::where('user_id', Auth::id())->delete();
                $otp = generateOTP();
                OTP::create([
                    'user_id' => Auth::id(),
                    'otp' => $otp,
                ]);

                // Send OTP to the user's email
                Mail::to(Auth::user()->email)->send(new SendOTP($otp));
                flash()->addSuccess('We Sent 6 Digit Code in your Mail');
            }

            return redirect()->route('verify.otp');
        }
    }
}
