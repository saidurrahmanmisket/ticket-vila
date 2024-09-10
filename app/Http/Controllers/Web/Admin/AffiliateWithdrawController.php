<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\AffiliateUserWithdrawalRequest;
use Exception;
use Illuminate\Http\Request;

class AffiliateWithdrawController extends Controller
{
    public function show(Request $request)
    {
        //permission check
        if (! has_permission('manage withdraw request')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $allWithdrawRequest = AffiliateUserWithdrawalRequest::when($request->status, function ($query, $value) {
            $query->where('status', $value);
        })->when($request->search, function ($query, $value) {
            $query->where(function ($q) use ($value) {
                $q->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$value}%"])
                    ->orWhere('email', 'like', '%'.$value.'%');
            });
        })->with('affiliateUser.user:id,first_name,last_name,email,phone')->latest()->paginate(15);

        // return $allWithdrawRequest;
        return view('admin.layouts.affiliate-toolkit-file.affiliate-withdraw-request', compact('allWithdrawRequest'));
    }

    public function status(Request $request, $id)
    {
        //permission check
        if (! has_permission('manage withdraw request')) {
            return response()->json([
                'success' => false,
                'message' => 'Permission denied: You do not have permission access this page',
            ]);
        }
        $validator = \Validator::make($request->all(), [
            'status' => 'required|in:'.Status::APPROVED.','.Status::REJECTED,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()->all(),
            ]);
        }

        try {
            $withdrawalRequest = AffiliateUserWithdrawalRequest::with('affiliateUser')->findOrFail($id);

            if (empty($withdrawalRequest)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Withdrawal request not found',
                ], 404);
            }

            if ($withdrawalRequest->status === Status::APPROVED) {
                return response()->json([
                    'success' => false,
                    'message' => 'Request already approved',
                ], 422);
            } elseif ($withdrawalRequest->status === Status::REJECTED) {
                return response()->json([
                    'success' => false,
                    'message' => 'Request already rejected',
                ], 422);
            }

            if ($request->status == Status::REJECTED) {
                try {
                    \DB::beginTransaction();
                    $withdrawalRequest->status = Status::REJECTED;
                    $withdrawalRequest->save();
                    $withdrawalRequest->affiliateUser->balance += $withdrawalRequest->amount;
                    $withdrawalRequest->affiliateUser->save();
                    \DB::commit();
                } catch (Exception $e) {
                    \DB::rollBack();

                    return response()->json([
                        'success' => false,
                        'message' => $e->getMessage(),
                    ], $e->getCode());
                }
            } elseif ($request->status === Status::APPROVED) {
                $withdrawalRequest->status = Status::APPROVED;
                $withdrawalRequest->save();
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Unknown status',
                ], 422);
            }

            return response()->json([
                'success' => true,
                'message' => 'Withdraw Request '.$request->status.'Successfully.',
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        }
    }
}
