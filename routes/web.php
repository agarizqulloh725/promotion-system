<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\GeneralRouteController;

Route::get('/', [GeneralRouteController::class, 'homePage']);
Route::get('/login', [GeneralRouteController::class, 'login']);
Route::get('/register', [GeneralRouteController::class, 'register']);
Route::get('/test', [GeneralRouteController::class, 'testToken']);

Route::get('/homepage', [GeneralRouteController::class, 'homePage']);
Route::get('/product', [GeneralRouteController::class, 'product']);
Route::get('/product/{id}', [GeneralRouteController::class, 'productShow']);
Route::get('/promo', [GeneralRouteController::class, 'promo']);
Route::get('/about', [GeneralRouteController::class, 'about']);
Route::get('/branch', [GeneralRouteController::class, 'branch']);
Route::get('/profile', [GeneralRouteController::class, 'profile']);

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [GeneralRouteController::class, 'adminDashboard'])->middleware('isAdmin');
    Route::get('/pro-category', [GeneralRouteController::class, 'ProCategory'])->middleware('isAdmin');
    Route::get('/brand', [GeneralRouteController::class, 'adminBrand'])->middleware('isAdmin');
    Route::get('/products', [GeneralRouteController::class, 'adminProduct'])->middleware('isAdmin');
    Route::get('/color', [GeneralRouteController::class, 'adminColor'])->middleware('isAdmin');
    Route::get('/promo', [GeneralRouteController::class, 'adminPromo'])->middleware('isAdmin');
    Route::get('/user-role', [GeneralRouteController::class, 'adminUser'])->middleware('isAdmin');
    Route::get('/product-promo', [GeneralRouteController::class, 'adminProductPromo'])->middleware('isAdmin');
    Route::get('/spesification', [GeneralRouteController::class, 'adminSpesification'])->middleware('isAdmin');
    Route::get('/branch', [GeneralRouteController::class, 'adminBranch'])->middleware('isAdmin');
    Route::get('/stock', [GeneralRouteController::class, 'adminStock'])->middleware('isAdmin');
    Route::get('/stock/{branch}/{product}/{specification}', [GeneralRouteController::class, 'adminShowStockSpecification'])->middleware('isAdmin');
    Route::get('/stock/{branch}/{product}', [GeneralRouteController::class, 'adminShowStockProduct'])->middleware('isAdmin');
    Route::get('/stock/{branch}', [GeneralRouteController::class, 'adminShowStockBranch'])->middleware('isAdmin');
});