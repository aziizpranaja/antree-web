<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\Mercant;
use Carbon\Carbon;

class NowserveController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $date = Carbon::today()->format('Y-m-d');

        $mercant = Mercant::where('user_id', '=', $user)
        ->first();

        $ongoing = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
        ->where('mercants.user_id', '=', $user)
        ->where('status', '=', 'ongoing')
        ->where('tickets.date', '=', $date)
        ->orderBy('tickets.created_at', 'asc')
        ->first(['status', 'queue_number']);

        return view('nowserve.index', compact('ongoing', 'mercant'));
    }
}
