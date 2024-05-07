<?php

use App\Http\Controllers\v1\GeneralRouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GeneralRouteController::class, 'homePage']);
Route::get('/login', [GeneralRouteController::class, 'login']);
Route::get('/register', [GeneralRouteController::class, 'register']);
