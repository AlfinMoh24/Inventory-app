<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukLokasiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/registrasi', [UserController::class, 'store']);

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::middleware(['auth:sanctum', 'throttle:60,1'])->group(function () {
    // Resource: Produk, Lokasi, Produk-Lokasi, Mutasi
    Route::apiResource('user', UserController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::apiResource('produk', ProdukController::class);
    Route::apiResource('lokasi', LokasiController::class);
    Route::apiResource('produk-lokasi', ProdukLokasiController::class);
    Route::apiResource('mutasi', MutasiController::class);
});

