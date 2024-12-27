<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;

// Route::apiResource('pesanans', PesananController::class);y

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/test', function () {
    return 'Hello, World!';
});

Route::get('/pesanans', [PesananController::class, 'index']);
Route::post('/pesanans', [PesananController::class, 'store']);
Route::get('/pesanans/{id}', [PesananController::class, 'show']);
Route::put('/pesanans/{id}', [PesananController::class, 'update']);
Route::delete('/pesanans/{id}', [PesananController::class, 'destroy']);
