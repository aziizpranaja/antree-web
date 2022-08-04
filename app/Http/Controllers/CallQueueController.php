<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CallQueueController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $mercant = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
                        ->where('mercants.user_id', '=', $user)
                        ->first(['mercant_name', 'tickets.id', 'status']);

        $pending = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
        ->where('mercants.user_id', '=', $user)
        ->where('status', '=', 'pending')
        ->get();

        $queue = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
        ->where('mercants.user_id', '=', $user)
        ->where('status', '=', 'pending')
        ->orderBy('tickets.created_at', 'asc')
        ->first(['tickets.id', 'status']);

        $ongoing = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
        ->where('mercants.user_id', '=', $user)
        ->where('status', '=', 'ongoing')
        ->orderBy('tickets.created_at', 'asc')
        ->first(['status', 'queue_number', 'tickets.id']);

        $done = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
        ->where('mercants.user_id', '=', $user)
        ->where('status', '=', 'done')
        ->get();

        $allPending = count($pending);
        $allDone = count($done);
        return view('callqueue.index', compact('mercant', 'allPending', 'allDone', 'queue', 'ongoing'));
    }

    public function callQueue($id)
    {
        Ticket::where('tickets.id', '=', $id)->update([
            'status' => 'ongoing',
            'updated_at' => Carbon::now()
        ]);
        return redirect ('/queue')->with('status', 'Success Call Queue');
    }

    public function doneQueue($id)
    {
        Ticket::where('tickets.id', '=', $id)->update([
            'status' => 'done',
            'updated_at' => Carbon::now()
        ]);
        return redirect ('/queue')->with('status', 'Success Done Queue');
    }
}
