<?php

namespace App\Http\Controllers\v1\api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductPromo;
use Illuminate\Http\Request;

use DB;
use PhpParser\Node\Stmt\Return_;

class FeController extends Controller
{
    public function getBrand() {
        try {
            $brands = Brand::whereHas('productCategory', function($query) {
                $query->where('id', 1);
            })->get();

            return response()->json([
                'success' => true,
                'message' => 'Brands retrieved successfully.',
                'data' => $brands
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve brands. Error: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function getBrandBicycle() {
        try {
            $brands = Brand::whereHas('productCategory', function($query) {
                $query->where('id', 2);
            })->get();

            return response()->json([
                'success' => true,
                'message' => 'Brands retrieved successfully.',
                'data' => $brands
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve brands. Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function getProduct(Request $request) {
        try {
            $query = Product::where('is_show', 1)->whereHas('brand.productCategory', function ($query) {
                $query->where('id', 1); //id sepedah phone
            });
            
            $years = isset($request->years) ? explode(',', $request->years) : [];
            if (!empty($years)) {
                $query->whereIn('year', $years);
            }
            
            $brands = isset($request->brands) ? explode(',', $request->brands) : [];
            if (!empty($brands)) {
                $query->whereIn('brand_id', $brands);
            }
    
            if ($request->has('search')) {
                $search = $request->search;
                $query->where(function($subQuery) use ($search) {
                    $subQuery->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
                });
            }
    
            if ($request->has('sort')) {
                switch ($request->sort) {
                    case 'relevance':
                        $sortBy = 'created_at';
                        $sortOrder = 'desc'; 
                        break;
                    case 'newest':
                        $sortBy = 'created_at';
                        $sortOrder = 'desc';
                        break;
                    case 'popularity':
                        $sortBy = 'is_popular';
                        $sortOrder = 'desc';
                        break;
                    default:
                        $sortBy = 'created_at';
                        $sortOrder = 'desc';
                        break;
                }
                $query->orderBy($sortBy, $sortOrder);
            } else {
                $query->orderBy('created_at', 'desc');
            }
            
            $products = $query->with(['images', 'promo'])->paginate(6);

            $promos = isset($request->promos) ? explode(',', $request->promos) : [];
            if (!empty($promos)) {
                $filteredProducts = $products->getCollection()->filter(function ($product) use ($promos) {
                    if (!$product->promo) return false;
                    foreach ($promos as $promoType) {
                        switch ($promoType) {
                            case 'Discount':
                                if (!empty($product->promo->discount)) return true;
                                break;
                            case 'Cashback':
                                if (!empty($product->promo->cashback)) return true;
                                break;
                            case 'Bonus':
                                if (!empty($product->promo->bonus)) return true;
                                break;
                        }
                    }
                    return false;
                })->values();
    
                $perPage = 6;
                $currentPage = $request->input('page', 1);
                $currentItemsCount = $filteredProducts->count();
                $total = $currentItemsCount; 
                $results = new \Illuminate\Pagination\LengthAwarePaginator(
                    $filteredProducts->forPage($currentPage, $perPage),
                    $total,
                    $perPage,
                    $currentPage,
                    [
                        'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(),
                        'pageName' => 'page',
                    ]
                );
            } else {
                $results = $products; 
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Products retrieved successfully.',
                'data' => $results
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve products. Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function getBicycle(Request $request){
        try {
            $query = Product::where('is_show', 1)->whereHas('brand.productCategory', function ($query) {
                $query->where('id', 2); //id sepedah listrik category
            });
            
            $years = isset($request->years) ? explode(',', $request->years) : [];
            if (!empty($years)) {
                $query->whereIn('year', $years);
            }
            
            $brands = isset($request->brands) ? explode(',', $request->brands) : [];
            if (!empty($brands)) {
                $query->whereIn('brand_id', $brands);
            }
    
            if ($request->has('search')) {
                $search = $request->search;
                $query->where(function($subQuery) use ($search) {
                    $subQuery->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
                });
            }
    
            if ($request->has('sort')) {
                switch ($request->sort) {
                    case 'relevance':
                        $sortBy = 'created_at';
                        $sortOrder = 'desc'; 
                        break;
                    case 'newest':
                        $sortBy = 'created_at';
                        $sortOrder = 'desc';
                        break;
                    case 'popularity':
                        $sortBy = 'is_popular';
                        $sortOrder = 'desc';
                        break;
                    default:
                        $sortBy = 'created_at';
                        $sortOrder = 'desc';
                        break;
                }
                $query->orderBy($sortBy, $sortOrder);
            } else {
                $query->orderBy('created_at', 'desc');
            }
            
            $products = $query->with(['images', 'promo'])->paginate(6);

            $promos = isset($request->promos) ? explode(',', $request->promos) : [];
            if (!empty($promos)) {
                $filteredProducts = $products->getCollection()->filter(function ($product) use ($promos) {
                    if (!$product->promo) return false;
                    foreach ($promos as $promoType) {
                        switch ($promoType) {
                            case 'Discount':
                                if (!empty($product->promo->discount)) return true;
                                break;
                            case 'Cashback':
                                if (!empty($product->promo->cashback)) return true;
                                break;
                            case 'Bonus':
                                if (!empty($product->promo->bonus)) return true;
                                break;
                        }
                    }
                    return false;
                })->values();
    
                $perPage = 6;
                $currentPage = $request->input('page', 1);
                $currentItemsCount = $filteredProducts->count();
                $total = $currentItemsCount; 
                $results = new \Illuminate\Pagination\LengthAwarePaginator(
                    $filteredProducts->forPage($currentPage, $perPage),
                    $total,
                    $perPage,
                    $currentPage,
                    [
                        'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(),
                        'pageName' => 'page',
                    ]
                );
            } else {
                $results = $products; 
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Products retrieved successfully.',
                'data' => $results
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve products. Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function getProductPromo(Request $request){
        try {
            $query = Product::where('is_show', 1)->whereHas('promo')->with('promo');
            
            $years = isset($request->years) ? explode(',', $request->years) : [];
            if (!empty($years)) {
                $query->whereIn('year', $years);
            }
            
            $brands = isset($request->brands) ? explode(',', $request->brands) : [];
            if (!empty($brands)) {
                $query->whereIn('brand_id', $brands);
            }
    
            if ($request->has('search')) {
                $search = $request->search;
                $query->where(function($subQuery) use ($search) {
                    $subQuery->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
                });
            }
    
            if ($request->has('sort')) {
                switch ($request->sort) {
                    case 'relevance':
                        $sortBy = 'created_at';
                        $sortOrder = 'desc'; 
                        break;
                    case 'newest':
                        $sortBy = 'created_at';
                        $sortOrder = 'desc';
                        break;
                    case 'popularity':
                        $sortBy = 'is_popular';
                        $sortOrder = 'desc';
                        break;
                    default:
                        $sortBy = 'created_at';
                        $sortOrder = 'desc';
                        break;
                }
                $query->orderBy($sortBy, $sortOrder);
            } else {
                $query->orderBy('created_at', 'desc');
            }
            
            $products = $query->with(['images', 'promo'])->paginate(6);

            $promos = isset($request->promos) ? explode(',', $request->promos) : [];
            if (!empty($promos)) {
                $filteredProducts = $products->getCollection()->filter(function ($product) use ($promos) {
                    if (!$product->promo) return false;
                    foreach ($promos as $promoType) {
                        switch ($promoType) {
                            case 'Discount':
                                if (!empty($product->promo->discount)) return true;
                                break;
                            case 'Cashback':
                                if (!empty($product->promo->cashback)) return true;
                                break;
                            case 'Bonus':
                                if (!empty($product->promo->bonus)) return true;
                                break;
                        }
                    }
                    return false;
                })->values();
    
                $perPage = 6;
                $currentPage = $request->input('page', 1);
                $currentItemsCount = $filteredProducts->count();
                $total = $currentItemsCount; 
                $results = new \Illuminate\Pagination\LengthAwarePaginator(
                    $filteredProducts->forPage($currentPage, $perPage),
                    $total,
                    $perPage,
                    $currentPage,
                    [
                        'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(),
                        'pageName' => 'page',
                    ]
                );
            } else {
                $results = $products; 
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Products retrieved successfully.',
                'data' => $results
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve products. Error: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function productPopular() {
        $products = Product::with(['images', 'promo'])  
                        ->orderBy('is_popular', 'desc')
                        ->take(4)
                        ->get();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Products retrieved successfully.',
            'data' => $products
        ]);
    }


    public function firstPromo() {
        $promo = ProductPromo::whereNotNull('promo_front')->first();
    
        return response()->json([
            'status' => 'success', 
            'message' => 'Promo retrieved successfully.',
            'data' => $promo
        ]);
    }
    
    
}