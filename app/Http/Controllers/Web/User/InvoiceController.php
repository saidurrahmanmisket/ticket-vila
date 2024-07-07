<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\SystemSetting;
use Illuminate\Http\Request;
use PDF; // Import Dompdf

class InvoiceController extends Controller
{
    public function downloadInvoice($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', \Auth::user()->id)
            ->with('tickets', 'user', 'campaign')
            ->firstOrFail();

        $pdf = PDF::loadView('user.pdf.invoice', compact('order',));
        return $pdf->download('invoice-' . $order->id . '.pdf');
    }
}
