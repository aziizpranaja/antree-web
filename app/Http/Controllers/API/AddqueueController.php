<?php

namespace App\Http\Controllers\API;

use App\Helpers\DateHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Mercant;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AddqueueController extends Controller
{

    public function addQueue(Request $request)
    {
        try {
            $arr = $request->input('mercant_id');
            $date = Carbon::today()->format('Y-m-d');
            $ticket = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
                    ->where('mercants.id', '=', $arr)
                    ->where('tickets.date', '=', $date)
                    ->orderBy('tickets.created_at', 'desc')
                    ->first();

            if(is_null($ticket)){
                $create = [
                    "user_id" => $request->input('user_id'),
                    "mercant_id" => $request->input('mercant_id'),
                    "queue_number" => 1,
                    "status" => "pending",
                    "date" => Carbon::now(),
                ];
                $queue = Ticket::create($create);
                return ResponseFormatter::success("Successfully added queue.");
            }

            $number = $ticket->queue_number + 1;

            $create = [
                "user_id" => $request->input('user_id'),
                "mercant_id" => $request->input('mercant_id'),
                "queue_number" => $number,
                "status" => "pending",
                "date" => Carbon::now(),
            ];

            $queue = Ticket::create($create);

            return ResponseFormatter::success("Successfully added queue.");
        }
        catch (Exception $e) {
            $response = [
                'errors' => $e->getMessage(),
            ];
            return ResponseFormatter::error($response, 'Something went wrong', 500);
        }
    }

    public function getQueue()
    {
        try{
            $user = Auth::user()->id;
            $queue = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
                            ->where('status', '=', 'pending')
                            ->where('tickets.user_id', '=', $user)
                            ->orderBy('tickets.created_at', 'desc')
                            ->get([
                                'tickets.id',
                                'mercant_id',
                                'tickets.user_id',
                                'queue_number',
                                'mercant_name',
                                'status',
                                'date',
                                'image',
                                'address',
                                'mercant_code',
                                'address',
                                'mercant_email',
                                'phone',
                            ]);

            if(is_null($queue)){
                return ResponseFormatter::error("Data not found!", 404);
            }

            foreach ($queue as $q) {
                $test1 = ($q->image !== null) ? env('APP_URL') . "/storage/$q->image" : '';
                $time = $q->date;
                $test2 = ($q->date !== null) ? date('d F Y', strtotime($time)) : '';
                $q->image = $test1;
                $q->date = $test2;
            }

            return ResponseFormatter::success([
                $queue
            ], 'Get Ticket Success');
        }
        catch (Exception $e) {
            $response = [
                'errors' => $e->getMessage(),
            ];
            return ResponseFormatter::error($response, 'Something went wrong', 500);
        }
    }

    public function getQueueDetail($id)
    {
        try{
            $user = Auth::user()->id;
            $queue = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
                            ->where('tickets.id', '=', $id)
                            ->where('tickets.user_id', '=', $user)
                            ->first([
                                'mercant_name',
                                'queue_number',
                                'mercant_id',
                            ]);

            if(is_null($queue)){
                return ResponseFormatter::error("Data not found!", 404);
            }

            $ongoing = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
            ->where('tickets.mercant_id', '=', $queue->mercant_id)
            ->where('status', '=', 'ongoing')
            ->first([
                'queue_number',
            ]);

            if(is_null($ongoing)){
                $response = [
                    'nama_mercant' => $queue->mercant_name,
                    'queue_number' => $queue->queue_number,
                    'now_serve' => $ongoing,
                ];

                return ResponseFormatter::success($response, 'Get Ticket');
            }

            $response = [
                'nama_mercant' => $queue->mercant_name,
                'queue_number' => $queue->queue_number,
                'now_serve' => $ongoing,
            ];

            return ResponseFormatter::success($response, 'Get Ticket');
        }
        catch (Exception $e) {
            $response = [
                'errors' => $e->getMessage(),
            ];
            return ResponseFormatter::error($response, 'Something went wrong', 500);
        }
    }

    public function cancelQueue($id)
    {
        try{
            $edit = [
                "status" => "cancel",
                'updated_at' => Carbon::now()
            ];

            $register = Ticket::where('id', '=', $id)
                            ->update($edit);

            return ResponseFormatter::success('Overtime has been approved');
        }
        catch (Exception $e) {
            $response = [
                'errors' => $e->getMessage(),
            ];
            return ResponseFormatter::error($response, 'Something went wrong', 500);
        }
    }

    public function getQueueHistory()
    {
        try{
            $user = Auth::user()->id;
            $queue = Ticket::join('mercants', 'tickets.mercant_id', '=', 'mercants.id')
                            ->where('tickets.user_id', '=', $user)
                            ->where('status', '!=', 'ongoing')
                            ->where('status', '!=', 'pending')
                            ->orderBy('tickets.updated_at', 'desc')
                            ->get([
                                'tickets.id',
                                'mercant_id',
                                'tickets.user_id',
                                'queue_number',
                                'mercant_name',
                                'status',
                                'date',
                                'image',
                                'address',
                                'mercant_code',
                                'address',
                                'mercant_email',
                                'phone',
                            ]);

            if(is_null($queue)){
                return ResponseFormatter::error("Data not found!", 404);
            }

            foreach ($queue as $q) {
                $test1 = ($q->image !== null) ? env('APP_URL') . "/storage/$q->image" : $q->attachment;
                $time = $q->date;
                $test2 = ($q->date !== null) ? date('d F Y', strtotime($time)) : '';
                $q->image = $test1;
                $q->date = $test2;
            }

            return ResponseFormatter::success([
                $queue
            ], 'Get History Ticket Success');
        }
        catch (Exception $e) {
            $response = [
                'errors' => $e->getMessage(),
            ];
            return ResponseFormatter::error($response, 'Something went wrong', 500);
        }
    }
}
