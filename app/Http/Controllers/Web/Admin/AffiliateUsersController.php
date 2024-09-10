<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\AffiliateUser;
use Illuminate\Http\Request;

class AffiliateUsersController extends Controller
{
    public function index(Request $request)
    {
        //permission check
        if (! has_permission('manage affiliate users')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $affiliateUsers = AffiliateUser::when($request->search, function ($query, $value) {
            $query->whereHas('user', function ($query) use ($value) {
                $query->where(function ($q) use ($value) {
                    $q->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$value}%"])
                        ->orWhere('email', 'like', '%'.$value.'%');
                });
            });
        })->with('user')->paginate(15);

        return view('admin.layouts.affiliate-user.index', compact('affiliateUsers'));
    }

    public function updateCommission(Request $request)
    {
        //permission check
        if (! has_permission('manage affiliate users')) {
            return response()->json([
                'success' => false,
                'message' => 'Permission denied: You do not have permission access this page',
            ]);
        }
        $validator = \Validator::make($request->all(), [
            'commission_rate' => 'required|numeric|min:0|max:100|regex:/^\d+\.\d{2}$/',
        ], [
            'commission_rate.regex' => 'The amount must be a valid number with exactly two decimal places.',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()->all(),
            ], 422);
        }
        $affiliateUser = AffiliateUser::findOrFail($request->id);

        if (empty($affiliateUser)) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, AffiliateUser with id '.$request->id.' cannot be found',

            ], 404);
        }

        try {
            $affiliateUser->commission_rate = $request->commission_rate;
            $affiliateUser->save();

            return response()->json([
                'success' => true,
                'message' => 'Commission rate updated successfully',
                'commission_rate' => $affiliateUser->commission_rate,
            ]);
        } catch (\Exception  $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        }
    }
}
