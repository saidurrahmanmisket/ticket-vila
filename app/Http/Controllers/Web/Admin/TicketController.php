<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    public function index(){
        $tickets = Ticket::latest()->with(['user','campaign','order'])->paginate(20);
        return view('admin.layouts.tickets.index',compact('tickets'));
    }

    public function download($id){
       $ticket = Ticket::findOrFail($id);
       $campaign = Campaign::findOrFail($ticket->campaign_id);

       if (Storage::exists($campaign->ebook)){
           return Storage::download($campaign->ebook);
       }else{
           flash()->addWarning('Ebook does not exist');
           return redirect()->back();
       }
    }
}
