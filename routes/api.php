<?php

use App\Http\Controllers\Api\AturanController;
use App\Http\Controllers\Api\GejalaController;
use App\Http\Controllers\Api\HasilController;
use App\Http\Controllers\Api\JawabanController;
use App\Http\Controllers\Api\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/gejala',GejalaController::class);
Route::apiResource('/aturan',AturanController::class);
Route::post('/form-gejala',[StoreController::class,'store_pengguna']);
Route::get('/hasil', [HasilController::class, 'index']);
Route::get('/hasil/{pengguna}', [HasilController::class, 'show']);
