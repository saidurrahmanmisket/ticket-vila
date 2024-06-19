<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Ticket;
use ZipArchive;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::latest()->with(['user', 'campaign', 'order'])->paginate(20);

        return view('admin.layouts.tickets.index', compact('tickets'));
    }

    public function download($id)
    {
        $ticket = Ticket::findOrFail($id);
        $campaign = Campaign::with(['ebooks'])->findOrFail($ticket->campaign_id);

        if ($campaign->ebooks->count() > 0) {
            $path = storage_path('app/ebook.zip');
            $zip = new ZipArchive;
            if ($zip->open($path, ZipArchive::CREATE) === true) {
                foreach ($campaign->ebooks->pluck('file')->toArray() as $file) {
                    $file = storage_path('app/'.$file);
                    $relativePath = basename($file);
                    $zip->addFile($file, $relativePath);
                }
                $zip->close();

                return response()->download($path)->deleteFileAfterSend(true);
            } else {
                flash()->addWarning('Something was wrong.');
            }

        } else {
            flash()->addWarning('Ebook does not exist');

            return redirect()->back();
        }
    }
}
