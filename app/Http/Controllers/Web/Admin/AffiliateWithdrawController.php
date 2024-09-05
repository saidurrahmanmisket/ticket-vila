<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\AffiliateUserWithdrawalRequest;
use Exception;
use Illuminate\Http\Request;

class AffiliateWithdrawController extends Controller
{
    public function show()
    {
        $allWithdrawRequest = AffiliateUserWithdrawalRequest::with('affiliateUser.user:id,first_name,last_name,email,phone')->paginate(15);

        // return $allWithdrawRequest;
        return view('admin.layouts.affiliate-toolkit-file.affiliate-withdraw-request', compact('allWithdrawRequest'));
    }

    public function destroy($id)
    {

        try {

            $withdrawRequest = AffiliateUserWithdrawalRequest::find($id);

            if ($withdrawRequest) {
                $withdrawRequest->delete();
            }

            flash()->addSuccess('Withdraw Request deleted successfully');

            return redirect()->route('admin.affiliate-withdraw-request.show');
        } catch (\Exception $e) {
            flash()->addError($e->getMessage());

            return redirect()->back();
        }
    }

    public function status(Request $request, $id)
    {

        try {
            AffiliateUserWithdrawalRequest::findOrFail($id)->update([
                'status' => $request->status,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Withdraw Request Status Changed Successfully.',
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
