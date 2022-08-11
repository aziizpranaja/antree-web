<?php

namespace App\Http\Controllers\API\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Validator;
use Exception;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try{
            $credentials = $request->all();

            $validate = Validator::make($credentials, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]);

            if ($validate->fails()) {
                $response = [
                    'errors' => $validate->errors()
                ];

                return ResponseFormatter::error($response, 'Bad Request', 400);
            }

            $create = [
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                "password" => password_hash($request->input('password'), PASSWORD_DEFAULT),
                "level" => "user",
            ];

            $register = User::create($create);

            return ResponseFormatter::success( "Succeed to added account.");
        }catch (Exception $e) {
            $statuscode = 500;
            if ($e->getCode()) $statuscode = $e->getCode();

            $response = [
                'errors' => $e->getMessage(),
            ];

            return ResponseFormatter::error($response, 'Something went wrong', $statuscode);
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password',);
            $deletedAccount = User::where('email', '=', $credentials['email'])
                            ->where('level', '=', 'user')
                            ->first();

            $validate = Validator::make($credentials, [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validate->fails()) {
                $response = [
                    'errors' => $validate->errors()
                ];

                return ResponseFormatter::error($response, 'Bad Request', 400);
            }

            if (!Auth::attempt($credentials)) {
                $messages = 'This account doesn\'t exist or wrong password.';

                throw new Exception($messages, 401);
            }

            $user = User::where('email', $request['email'])->firstOrFail();
            $token = $user->createToken('auth_token')->accessToken;

            $response = [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ];

            return ResponseFormatter::success($response, 'Authenticated Success', 200);
        }

        catch (Exception $e) {
            $statuscode = 500;
            if ($e->getCode()) $statuscode = $e->getCode();

            $response = [
                'errors' => $e->getMessage(),
            ];

            return ResponseFormatter::error($response, 'Something went wrong', $statuscode);
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::user()->token();
        $user->revoke();
        $response = [
            'messages' => 'Success logout'
        ];

        return ResponseFormatter::success($response, 'Token was revoked');
    }
}
