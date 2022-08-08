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
                        ->first(['mercant_name', 'mercant_code', 'address', 'phone', 'mercant_email']);
        return view('profile.index', compact('mercant'));
    }
}
