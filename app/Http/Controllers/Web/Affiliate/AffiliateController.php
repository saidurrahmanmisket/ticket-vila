<?php

namespace App\Http\Controllers\Web\Affiliate;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Mail\AffiliateInvite;
use App\Models\AffiliateCommission;
use App\Models\AffiliateFile;
use App\Models\AffiliateUser;
use App\Models\AffiliateUserWithdrawalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use ZipArchive;

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

    public function downloadFile($type)
    {
        $zip = new ZipArchive;
        if ($type == 'all') {
            $fileName = 'toolkit-files.zip';
        } else {
            $fileName = $type.'.zip';
        }

        // Path to store the zip file
        $zipPath = storage_path($fileName);

        if ($zip->open($zipPath, ZipArchive::CREATE) === true) {
            // Add files to the zip
            if ($type == 'all') {
                $files = AffiliateFile::where('status', Status::ACTIVE)->pluck('file')->toArray();
            } else {
                $files = AffiliateFile::where('file_type', $type)->where('status', Status::ACTIVE)->pluck('file')->toArray();
            }
            if (count($files) > 0) {
                foreach ($files as $file) {
                    $filePath = public_path($file);
                    if (file_exists($filePath)) {
                        $zip->addFile($filePath, basename($file));
                    }
                }
            } else {
                flash()->addError('file  not found.');

                return redirect()->back();
            }

            // Close the zip after adding the files
            $zip->close();
        } else {
            flash()->addError('Could not create the zip file.');

            return redirect()->back();
        }

        // Download the generated zip file
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    public function storeWithdrawRequest(Request $request)
    {

        // Validate the request data
        $request->validate([
            'account_holder_name' => 'required|string|max:255',
            'bank_account_number' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'bank_branch_name' => 'required|string|max:255',
            'bank_routing_number' => 'required|string|max:255',
            'swift_bic_code' => 'nullable|string|max:255',
            'country_of_bank' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
        ]);

        // Check if the user has sufficient balance for the withdrawal request
        $totalCommissionAmount = AffiliateCommission::where('affiliate_user_id', Auth::user()->id)->sum('amount');

        if ($totalCommissionAmount < $request->amount) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient Balance',
            ]);
        }

        // Get the latest withdrawal request
        $lastRequest = AffiliateUserWithdrawalRequest::where('affiliate_user_id', Auth::user()->id)
            ->latest('requested_at') // Get the most recent request
            ->first(); // Get the first record

        // Check if the last request was within the last month
        if ($lastRequest && $lastRequest->requested_at->gt(now()->subMonth())) {
            return response()->json([
                'success' => false,
                'message' => 'You can\'t request again before one month',
            ]);
        }

        // Check user pending balance
        $pendingBalance = AffiliateUserWithdrawalRequest::where('affiliate_user_id', Auth::user()->id)
            ->where('status', Status::PENDING)
            ->sum('amount');

        // Calculate the available balance without pending requests
        $balanceWithoutPending = $totalCommissionAmount - $pendingBalance;

        if ($balanceWithoutPending < $request->amount) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient Balance',
            ]);
        }

        // Create a new withdrawal request
        AffiliateUserWithdrawalRequest::create([
            'affiliate_user_id' => Auth::id(), // Get the currently authenticated user's ID
            'account_holder_name' => $request->account_holder_name,
            'bank_account_number' => $request->bank_account_number,
            'bank_name' => $request->bank_name,
            'bank_branch_name' => $request->bank_branch_name,
            'bank_routing_number' => $request->bank_routing_number,
            'swift_bic_code' => $request->swift_bic_code,
            'country_of_bank' => $request->country_of_bank,
            'amount' => $request->amount,
            'status' => 'pending', // Default status
            'requested_at' => now(), // Current timestamp
        ]);

        // Redirect back with success message
        return response()->json([
            'success' => true,
            'message' => 'Withdrawal Request Submitted!, Admin will review your request and Transfer your money to your bank account',
        ]);
    }
}
