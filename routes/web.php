<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\RegistrationController;

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
    return view('welcome');
});
Route::get('razorpay-payment', [RazorpayController::class, 'index']);
Route::post('razorpay-payment', [RazorpayController::class, 'store'])->name('razorpay.payment.store');

Route::get('/registration_form', [RegistrationController::class, 'showRegistrationForm']);
Route::post('/register', [RegistrationController::class, 'register']);

