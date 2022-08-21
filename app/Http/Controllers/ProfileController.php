<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mercant;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $mercant = Mercant::where('user_id', '=', $user)
                            ->first(['mercant_name', 'mercant_code', 'address', 'phone', 'mercant_email', 'max_ticket', 'id']);
        return view('profile.index', compact('mercant'));
    }

    public function edit(Request $request)
    {
        $arr = $request->except('_token');
        $test = $request->input('id');
        $data = Mercant::where('id', $test)->update([
            "max_ticket" => $arr['max_ticket'],
        ]);

        if ($data) {
            return response()->json(["error" => false, "message" => "Updated Data has been sent, Please wait for it to be approved"]);
        } else {
            return response()->json(["error" => true, "message" => "Data Is Not Found!"]);
        }
    }
}
