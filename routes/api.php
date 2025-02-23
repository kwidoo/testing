<?php

use App\Http\Controllers\DefaultTableController;
use App\Http\Controllers\FieldController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/table', [DefaultTableController::class, 'index']);
Route::match(['get', 'post'], '/fields', [FieldController::class, 'index']);
