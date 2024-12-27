<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function() {
    return 'Hello, World!';
});
Route::get('/menus', [MenuController::class, 'apiIndex']);
Route::post('/menus', [MenuController::class, 'apiStore']);
Route::get('/menus/{id}', [MenuController::class, 'apiShow']);
Route::put('/menus/{id}', [MenuController::class, 'apiUpdate']);
Route::delete('/menus/{id}', [MenuController::class, 'apiDestroy']);