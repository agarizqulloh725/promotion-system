<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\api\FeController;
use App\Http\Controllers\v1\api\AuthController;
use App\Http\Controllers\v1\api\UserController;
use App\Http\Controllers\v1\api\BrandController;
use App\Http\Controllers\v1\api\ColorController;
use App\Http\Controllers\v1\api\PromoController;
use App\Http\Controllers\v1\api\BranchController;
use App\Http\Controllers\v1\api\ProductController;
use App\Http\Controllers\v1\api\ProSizeController;
use App\Http\Controllers\v1\api\ProColorController;
use App\Http\Controllers\v1\api\ProImageController;
use App\Http\Controllers\v1\api\ProPromoController;
use App\Http\Controllers\v1\api\ProStockController;
use App\Http\Controllers\v1\api\WishlistController;
use App\Http\Controllers\v1\api\DashboardController;
use App\Http\Controllers\v1\api\ProBranchController;
use App\Http\Controllers\v1\api\PermissionController;
use App\Http\Controllers\v1\api\ProCategoryController;
use App\Http\Controllers\v1\api\SpecificationController;
use App\Http\Controllers\v1\api\RolePermissionController;
use App\Http\Controllers\v1\api\ProSpecificationController;

Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('me', [AuthController::class, 'userCheck'])->middleware('auth:sanctum');

    Route::get('get-brand', [FeController::class, 'getBrand']);
    Route::get('get-products', [FeController::class, 'getProduct']);
    Route::get('get-brand-bicycle', [FeController::class, 'getBrandBicycle']);
    Route::get('get-bicycle', [FeController::class, 'getBicycle']);

    Route::prefix('admin')->group(function () {
        Route::middleware('auth:sanctum')->group(function () {
            Route::resources([
                'branch' => BranchController::class,
                'pro-category' => ProCategoryController::class,
                'brand' => BrandController::class,
                'color' => ColorController::class,
                'pro-color' => ProColorController::class,
                'specification' => SpecificationController::class,
                'pro-specification' => ProSpecificationController::class,
                'pro-size' => ProSizeController::class,
                'promo' => PromoController::class,
                'wishlist' => WishlistController::class,
                'permissions' => PermissionController::class,
                'role-permissions' => RolePermissionController::class,
                'product' => ProductController::class,
                'pro-image' => ProImageController::class,
                'pro-promo' => ProPromoController::class,
                'pro-stock' => ProStockController::class,
                'user' => UserController::class,
                'pro-branch' => ProBranchController::class,
                'dashboard' => DashboardController::class,

            ]);
        });
    });    
});
