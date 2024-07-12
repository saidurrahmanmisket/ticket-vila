<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use PDF; // Import Dompdf

class InvoiceController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'campaign')->latest()->paginate(20);

        return view('admin.layouts.invoice.index', compact('orders'));
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
