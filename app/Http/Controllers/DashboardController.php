<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Mercant;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $date = Carbon::today();
        $mercant = Mercant::where('user_id', '=', $user)
                        ->first(['mercant_name', 'mercant_code']);

        $ticket = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
        ->where('mercants.user_id', '=', $user)
        ->where('tickets.date', '=', $date)
        ->get();

        $cancel = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
        ->where('mercants.user_id', '=', $user)
        ->where('tickets.date', '=', $date)
        ->where('status', '=', 'cancel')
        ->get();

        $pending = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
        ->where('mercants.user_id', '=', $user)
        ->where('tickets.date', '=', $date)
        ->where('status', '=', 'pending')
        ->get();

        $ongoing = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
        ->where('mercants.user_id', '=', $user)
        ->where('tickets.date', '=', $date)
        ->where('status', '=', 'ongoing')
        ->get();

        $allTicket = count($ticket);
        $allCancel = count($cancel);
        $allPending = count($pending);
        $allOngoing = count($ongoing);
        return view('dashboard.index', compact('mercant', 'allTicket', 'allCancel', 'allPending', 'allOngoing'));
    }
}
