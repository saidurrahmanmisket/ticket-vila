<?php

namespace App\Http\Controllers\Web\Affiliate;

use App\Http\Controllers\Controller;
use App\Mail\AffiliateInvite;
use App\Models\AffiliateUser;
use Illuminate\Http\Request;
use Str;

class AffiliateController extends Controller
{
    public function join()
    {
        $user = auth()->user();

        if (empty(auth()->user()->load('affiliate')->affiliate)) {
            AffiliateUser::create([
                'user_id' => $user->id,
                'affiliate_code' => $this->generateReferralCode(),
                'commission_rate' => 15,
            ]);
            flash()->addSuccess('You have joined the affiliate successfully.');
        } else {
            flash()->addWarning('You have already joined this affiliate.');
        }

        return redirect(route('affiliate.dashboard'));
    }

    public function generateReferralCode()
    {
        $code = Str::random(8);
        // Ensure the code is unique
        while (AffiliateUser::where('affiliate_code', $code)->exists()) {
            $code = Str::random(8);
        }

        return $code;
    }

    public function sendInvitation(Request $request)
    {
        $request->validate([
            'emails' => ['required', 'array'],
            'emails.*' => ['required', 'email', 'max:100'],
        ], [
            'emails.required' => 'The emails filed is required.',
            'emails.array' => 'The emails filed must be one email.',
            'emails.*.required' => 'The emails filed is required.',
            'emails.*.email' => 'The emails filed must be a valid email address.',
            'emails.*.max' => 'The emails filed must be less than 100 characters.',
        ]);
        try {
            foreach ($request->emails as $email) {
                \Mail::to($email)->send(new AffiliateInvite(route('referral', auth()->user()->load('affiliate')->affiliate->affiliate_code)));
            }

            return response()->json([
                'success' => true,
                'message' => 'Invitation mail send successfully.',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
