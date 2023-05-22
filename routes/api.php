<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function(Request $request) {
    return response()->json([
        'success' => true,
        'message' => 'App is running!'
    ]);
});

Route::apiResource('login', AuthController::class)->only('store');

Route::apiResources([
    'users' => UserController::class,
    'expenses' => ExpenseController::class
]);
