<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CallQueueController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NowserveController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//landing page
Route::get('/', [LandingController::class, 'index']);

//Login dan Register
Route::get('/loginpage', [LoginController::class, 'index']);
Route::get('/registerpage', [LoginController::class, 'registerpage']);
Route::post('/regiter', [LoginController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//dashboard admin
Route::group(['middleware' => ['auth', 'CekLevel:admin']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/queue', [CallQueueController::class, 'index']);
    Route::put('/queue/{id}', [CallQueueController::class, 'callQueue']);
    Route::put('/queue/done/{id}', [CallQueueController::class, 'doneQueue']);
    Route::get('/ticket', [TicketController::class, 'index']);
    Route::get('/ticket/get', [TicketController::class, 'getTicket']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/nowserve', [NowserveController::class, 'index']);
});
