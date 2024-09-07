<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Ticket;
use Illuminate\Http\Request;
use ZipArchive;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        //permission check
        if (! has_permission('tickets menu')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $tickets = Ticket::when($request->search, function ($query, $value) {
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
        })->latest()->with(['user', 'campaign', 'order'])->paginate(20);

        //campaigns
        $campaigns = Campaign::all();

        return view('admin.layouts.tickets.index', compact('tickets', 'campaigns'));
    }

    public function download($id)
    {
        //permission check
        if (! has_permission('tickets download')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
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
