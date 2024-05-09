<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\GeneralRouteController;

Route::get('/', [GeneralRouteController::class, 'homePage']);
Route::get('/login', [GeneralRouteController::class, 'login']);
Route::get('/register', [GeneralRouteController::class, 'register']);
Route::get('/test', [GeneralRouteController::class, 'testToken']);

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [GeneralRouteController::class, 'adminDashboard']);
});