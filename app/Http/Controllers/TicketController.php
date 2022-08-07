<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TicketController extends Controller
{
    public function index()
    {
        return view('ticket.index');
    }

    public function getTicket(Request $request)
    {
        $user = Auth::user()->id;
        $ticket = Ticket::join('users', 'tickets.user_id', '=', 'users.id')
                        ->where('mercant_id', '=', $user)
                        ->where('status', '!=', 'pending')
                        ->where('status', '!=', 'ongoing')
                        ->orderBy('tickets.created_at', 'desc');

        if (request('date') != 0) {
            $ticket->where('date', '=', $request->date);
        }

        if (request('status') > 0) {
            $ticket->where('status',  $request->status);
        }

        $ticketData = [];

        foreach ($ticket->get(['name', 'queue_number', 'date', 'status']) as $t) {
            $ticketData[] = (object) [
                'name'                => $t->name,
                'queue_number'       => $t->queue_number,
                'date'              => date('d/m/Y', strtotime($t->date)),
                'status'          => $t->status
            ];
        }

        return DataTables::of($ticketData)
            ->addIndexColumn()
            ->toJson(true);
    }

}
