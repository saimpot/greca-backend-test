<?php

use App\Http\Controllers\Api\Booking\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['api'])->group(function() {
    Route::get('bookings', [BookingController::class, 'index']);
    Route::post('bookings/store', [BookingController::class, 'store']);
});
