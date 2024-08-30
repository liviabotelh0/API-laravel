<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportController;
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("/sports", SportController::class);
Route::apiResource("/trainers", SportController::class);
Route::apiResource("/localities", SportController::class);
Route::apiResource("/competitors", SportController::class);