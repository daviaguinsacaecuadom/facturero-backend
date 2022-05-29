<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Billing;

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/excel', ExcelController::class);
Route::resource('/pdf', PdfController::class);


Route::group(['middleware' => ['role:admin|edit|client']], function () {
    Route::resource('/billing', BillingController::class);
    Route::get('/filter', [BillingController::class, 'filter'])->name('billing.filter');
});

Route::group(['middleware' => ['role:edit|admin']], function () {
    Route::resource('/user', UserController::class);
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('/role',RoleController::class);
});

