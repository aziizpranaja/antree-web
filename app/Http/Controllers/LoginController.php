<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Mercant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registerpage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $test = $request->all();
        $validate = Validator::make(
            $test,
            [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
                'mercant_name' => 'required',
                'address' => 'required',
                'mercant_email' => 'required|unique:mercants',
                'phone' => 'required|numeric|size:12',
                'level' => 'required',
                'image' => 'image|file|max:1024',
            ]
        );

        if ($request->file('image')) {
            $test['image'] = $request->file('image')->store('mercant-images');
        }

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'level' => "admin",
            'remember_token' => Str::random(60),
        ]);

        Mercant::create([
            'mercant_name' => $request->mercant_name,
            'address' => $request->address,
            'mercant_email' => $request->mercant_email,
            'phone' => $request->phone,
            'user_id' => $data->id,
            'mercant_code' => Str::random(4),
            'image' => $test['image'],
        ]);
        return redirect ('/loginpage')->with('status', 'Register Berhasil Dilakukan');
    }

    public function login(Request $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'level'=>'admin']))
        {
            return redirect ('/dashboard');
        }
        return redirect('/loginpage')->with('error', 'Gagal Login Username Atau Password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect ('/');
    }
}
