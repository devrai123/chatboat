<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RozarPaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/chatbots',[ChatbotController::class,'index']);
Route::post('chatbot',[ChatbotController::class,'sendMessage']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::get('/rozarpayments', [RozarPaymentController::class, 'index'])->name('rozarpayments');
Route::post('/rozarpayments/store', [RozarPaymentController::class, 'store'])
    ->name('rozarpayments.store');

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});