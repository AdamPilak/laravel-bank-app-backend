<?php

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

Route::apiResource('users', \App\Http\Controllers\BankUserController::class);

Route::apiResource('logs', \App\Http\Controllers\LogController::class);

Route::post('/check', [\App\Http\Controllers\BankUserController::class, 'checkIfUserExists']);

Route::post('/login', [\App\Http\Controllers\BankUserController::class, 'checkIfUserIsValid']);

// Route::post('/logsByUserId', [\App\Http\Controllers\LogController::class, 'getLogsByUserId']);
