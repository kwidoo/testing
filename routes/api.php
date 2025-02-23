<?php

use App\Http\Controllers\DefaultTableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/table', [DefaultTableController::class, 'index']);
