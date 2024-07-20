<?php

namespace App\Http\Controllers\v1\api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class FeController extends Controller
{
    public function getBrand() {
        try {
            $brands = Brand::whereHas('productCategory', function($query) {
                $query->where('name', 'phone');
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
            $query = Product::where('is_show', 1);

            // return response()->json($query);
    
            $years = $request->has('years') ? explode(',', $request->years) : [];
            $brands = $request->has('brands') ? explode(',', $request->brands) : [];
            $promos = $request->has('promos') ? explode(',', $request->promos) : [];
    
            if (!empty($years)) {
                $query->whereIn('year', $years);
            }
    
            if (!empty($brands)) {
                $query->whereIn('brand_id', $brands);
            }
    
            if (!empty($promos)) {
                $query->whereHas('promotions', function ($subQuery) use ($promos) {
                    $subQuery->whereIn('type', $promos);
                });
            }
    
            $products = $query->paginate(6);
    
            return response()->json([
                'success' => true,
                'message' => 'Products retrieved successfully.',
                'data' => $products
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve products. Error: ' . $e->getMessage(),
            ], 500);
        }
    }
    


    
}
