<?php

namespace App\Http\Controllers\v1\api;

use DB;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductPromo;
use Illuminate\Http\Request;
use App\Models\Specification;
use Laracasts\Flash\Flash;

use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\Controller;
use App\Models\ProductSpecification;
use App\Models\ProductStock;

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

            // // Cek apakah hasil pencarian kosong
            // if ($results->isEmpty()) {
            //     Flash::error('Produk tidak ditemukan.');
            //     return response()->json([
            //         'success' => false,
            //         'message' => 'Produk tidak ditemukan.',
            //     ], 404);
            // }

            
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
    public function showProductId($id) {
        try {
            $results = Product::with(['images', 'promo', 'brand'])->find($id);
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
    public function showSpecificationId($id){
        try {
            $specificationIds = ProductSpecification::where('product_id', $id)
                                                    ->distinct()
                                                    ->pluck('specification_id');

                                                    
            $results = Specification::whereIn('id', $specificationIds)->get();

            if ($results->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No specifications found for this product.',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Product specifications retrieved successfully.',
                'data' => $results
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve product specifications. Error: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function showColorId($id){
        try {
            $colorIds = ProductColor::where('product_id', $id)
                                                    ->distinct()
                                                    ->pluck('color_id');
            $results = Color::whereIn('id', $colorIds)->get();

            if ($results->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No specifications found for this product.',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Product specifications retrieved successfully.',
                'data' => $results
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve product specifications. Error: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function showStockId($id, Request $request){
        try {
            if ($request->spec || $request->color) {
                $query = ProductStock::where('product_id', $id);
            
                if ($request->spec) {
                    $specificationIds = ProductSpecification::where('specification_id', $request->spec)->pluck('id');
                    // dd($specificationIds);
                    $query->whereIn('product_specification_id', $specificationIds);
                }
            
                if ($request->color) {
                    $colorIds = ProductColor::where('color_id', $request->color)->pluck('id');
                    // dd($colorIds);
                    $query->whereIn('product_color_id', $colorIds);
                }
            
                $totalStock = $query->sum('stock');
            } else {

                $totalStock = ProductStock::where('product_id', $id)->sum('stock');
            }

            return response()->json([
                'success' => true,
                'message' => 'Products retrieved successfully.',
                'data' => $totalStock
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve products. Error: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function clickSpecificationId($id){
        try {
            $harga = ProductSpecification::where('specification_id', $id)->value('price');
            $idProduct = ProductSpecification::where('specification_id', $id)->first();
            $discount = ProductPromo::where('product_id', $idProduct->product_id)->value('discount');
            $idProSpec = ProductSpecification::where('specification_id', $id)->pluck('id');
            
            
            $colorIds = ProductColor::whereIn('product_specification_id', $idProSpec)
                                                    ->distinct()
                                                    ->pluck('color_id');
            $results = Color::whereIn('id', $colorIds)->get();
    
            if ($results->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No specifications found for this product.',
                ], 404);
            }
    
            return response()->json([
                'success' => true,
                'message' => 'Product specifications retrieved successfully.',
                'data' => $results,
                'price' => $harga,
                'discount' => $discount
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve product specifications. Error: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function clickColorId($id){
        try {
            $colorIds = ProductColor::where('product_id', $id)
                                                    ->distinct()
                                                    ->pluck('color_id');
            $results = Color::whereIn('id', $colorIds)->get();
    
            if ($results->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No specifications found for this product.',
                ], 404);
            }
    
            return response()->json([
                'success' => true,
                'message' => 'Product specifications retrieved successfully.',
                'data' => $results
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve product specifications. Error: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function imgbycolor($id , $colorid){
        try {
            $colorId = ProductColor::where('product_id',$id)->where('color_id', $colorid)->first();
            return response()->json([
                'success' => true,
                'message' => 'Product specifications retrieved successfully.',
                'data' => $colorId
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve product specifications. Error: ' . $e->getMessage(),
            ], 500);
        }
    }
    
}