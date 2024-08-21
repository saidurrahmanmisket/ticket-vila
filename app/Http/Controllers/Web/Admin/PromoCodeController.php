<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //permission check
        if (! has_permission('promo code menu')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $promoCodes = PromoCode::paginate(20);

        return view('admin.layouts.promo-code.index', compact('promoCodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //permission check
        if (! has_permission('promo code create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        return view('admin.layouts.promo-code.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //permission check
        if (! has_permission('promo code create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        //validate request
        $request->validate([
            'code' => 'required|string|max:150|unique:promo_codes,code',
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'expires_at' => 'required|date|date_format:Y-m-d\TH:i',
            'usage_limit' => 'required|numeric|min:0|max:2147483647',
            'min_quantity' => 'required|integer|min:0|max:9|lte:max_quantity',
            'max_quantity' => 'required|integer|min:0|max:9|gte:min_quantity',
        ]);

        PromoCode::create([
            'code' => $request->code,
            'discount_percentage' => $request->discount_percentage,
            'expires_at' => $request->expires_at,
            'usage_limit' => $request->usage_limit,
            'min_quantity' => $request->min_quantity,
            'max_quantity' => $request->max_quantity,
        ]);

        flash()->addSuccess('Promo code has been created successfully.');

        return redirect()->route('admin.promo-code.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //permission check
        if (! has_permission('promo code edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        $promoCode = PromoCode::findOrFail($id);
        if (empty($promoCode)) {
            abort('404', 'Promo code not found');
        }

        return view('admin.layouts.promo-code.edit', compact('promoCode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //permission check
        if (! has_permission('promo code edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        $request->validate([
            'code' => 'required|string|max:150|unique:promo_codes,code,'.$id,
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'expires_at' => 'required|date|date_format:Y-m-d\TH:i',
            'usage_limit' => 'required|numeric|min:0|max:2147483647',
            'min_quantity' => 'required|integer|min:0|max:9',
            'max_quantity' => 'required|integer|min:0|max:9',
        ]);

        $promoCode = PromoCode::findOrFail($id);
        if (empty($promoCode)) {
            abort('404', 'Promo code not found');
        }

        $promoCode->update([
            'code' => $request->code,
            'discount_percentage' => $request->discount_percentage,
            'expires_at' => $request->expires_at,
            'usage_limit' => $request->usage_limit,
            'min_quantity' => $request->min_quantity,
            'max_quantity' => $request->max_quantity,
        ]);

        flash()->addSuccess('Promo code has been updated successfully.');

        return redirect()->route('admin.promo-code.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //permission check
        if (! has_permission('promo code delete')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $promoCode = PromoCode::findOrFail($id);
        if (empty($promoCode)) {
            abort('404', 'Promo code not found');
        }
        $promoCode->delete();
        flash()->addSuccess('Promo code has been deleted successfully.');

        return redirect()->route('admin.promo-code.index');
    }

    public function status(string $id)
    {
        //permission check
        if (! has_permission('promo code delete')) {
            return response()->json([
                'success' => false,
                'message' => 'Permission denied: You do not have permission access this page',

            ]);
        }
        try {
            $promoCode = PromoCode::findOrFail($id);
            if (empty($promoCode)) {
                abort('404', 'Promo code not found');
            }
            if ($promoCode->status == Status::ACTIVE) {
                $promoCode->status = Status::INACTIVE;
            } else {
                $promoCode->status = Status::ACTIVE;
            }
            $promoCode->save();

            return response()->json([
                'success' => true,
                'message' => 'Promo code status has been updated successfully.',
                'data' => $promoCode,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!',
            ]);
        }

    }
}
