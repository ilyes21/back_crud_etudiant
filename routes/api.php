<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\EtudiantController;

Route::middleware('api')->group(function () {
    Route::resource('etudiants', EtudiantController::class);
});

Route::middleware('auth:api')->group(function () {

    Route::get('/etudiants', [EtudiantController::class, 'index']);
    Route::post('/etudiants', [EtudiantController::class, 'store']);
    Route::get('/etudiants/{id}', [EtudiantController::class, 'show']);
    Route::put('/etudiants/{id}', [EtudiantController::class, 'update']);
    Route::delete('/etudiants/{id}', [EtudiantController::class, 'destroy']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
});
