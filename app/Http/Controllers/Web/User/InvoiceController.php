<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

// Import Dompdf

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::when($request->search, function ($query, $value) {
            $query->whereHas('user', function ($queryTwo) use ($value) {
                $queryTwo->where(function ($q) use ($value) {
                    $q->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$value}%"])
                        ->orWhere('email', 'like', '%'.$value.'%');
                });
            });
        })->when($request->campaign, function ($query, $value) {
            $query->whereHas('campaign', function ($queryTwo) use ($value) {
                $queryTwo->where('id', $value);
            });
        })->when($request->start_date && $request->end_date, function ($query) use ($request) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        })->with('user', 'campaign')->latest()->paginate(20);
        //campaigns
        $campaigns = Campaign::all();

        return view('admin.layouts.invoice.index', compact('orders', 'campaigns'));
    }

    public function downloadInvoice($id)
    {
        $query = Order::where('id', $id)
            ->with('tickets', 'user', 'campaign');
        if (\Auth::user()->role == 'admin') {
            $order = $query->firstOrFail();
        } else {
            $query->where('user_id', \Auth::user()->id);
            $order = $query->firstOrFail();
        }
        $pdf = PDF::loadView('user.pdf.invoice', compact('order'));

        return $pdf->download('invoice-'.$order->id.'.pdf');
    }
}
