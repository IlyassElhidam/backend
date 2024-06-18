<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\HouseUserController;
use App\Http\Controllers\externController;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('houses_admin',HouseController::class);
Route::apiResource('houses_user',HouseUserController::class);
Route::get('/search/{low?}/{up?}',[externController::class,'search']);
Route::get('/orders',[externController::class,'orders']);
Route::delete('/delete_order/{id?}',[externController::class,'deleteOrder']);
Route::put('/confirmation/{id?}',[externController::class,'confirmationTest']);
Route::put('/done/{id?}',[externController::class,'doneOrder']);
Route::post('/admin',[externController::class, 'checkAdmin']);