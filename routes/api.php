<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\auth\AuthController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\QrcodeController;
use App\Http\Controllers\API\AddqueueController;
use App\Http\Controllers\API\MercantController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->get('/profile', [ProfileController::class, 'getProfile']);
Route::middleware('auth:api')->group( function () {
    Route::get('/qrcode/{mercant_code}', [QrcodeController::class, 'getQr']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/queue', [AddqueueController::class, 'addQueue']);
    Route::get('/queue/get', [AddqueueController::class, 'getQueue']);
    Route::get('/queue/get/{id}', [AddqueueController::class, 'getQueueDetail']);
    Route::post('/queue/edit/{id}', [AddqueueController::class, 'cancelQueue']);
    Route::get('/queue/history', [AddqueueController::class, 'getQueueHistory']);
    Route::get('/mercant', [MercantController::class, 'getMercant']);
});
