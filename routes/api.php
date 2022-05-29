<?php

use App\Http\Controllers\Api\BillingApiController;
use App\Http\Controllers\Api\PaymentezApiController;
use App\Models\Payment;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/billings',BillingApiController::class);
Route::resource('/paymentez', PaymentezApiController::class);
Route::get('/tokenuser', [PaymentezApiController::class,'paymentezToken']);
