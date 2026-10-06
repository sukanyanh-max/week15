<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\TokenController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [TokenController::class, 'store'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn ($request) => $request->user());
    Route::apiResource('orders', OrderController::class)->only(['index', 'store', 'show']);
    Route::delete('/logout', [TokenController::class, 'destroy'])->name('api.logout');
});
