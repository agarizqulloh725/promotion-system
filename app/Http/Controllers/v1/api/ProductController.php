<?php

namespace App\Http\Controllers\v1\api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::all();
            return response()->json($products, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch data', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'slug' => 'required|string|unique:product,slug',
                'description' => 'nullable|string',
                'price' => 'nullable|numeric|min:0',
                'link_video' => 'nullable|string',
                'link_tokopedia' => 'nullable|string',
                'is_show' => 'nullable|boolean',
                'is_popular' => 'nullable|boolean',
            ]);

            $product = Product::create($validatedData);
            if($product){
                if ($request->hasFile('product_images')) {
                    $images = $request->file('product_images');
                    $imageNames = [];
        
                    foreach ($images as $image) {
                        if ($image->isValid()) {
                            $randomFileName = uniqid('product-image_') . '.' . $image->extension();
                            $image->move(public_path('images/product-image'), $randomFileName);
                            DB::table('product_image')->insert([
                                'product_id' => $product->id,
                                'name' => $randomFileName
                            ]);
                        }
                    }
                }
            }
            return response()->json($product, 201);

        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to create resource', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            return response()->json($product, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Resource not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch resource', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'slug' => 'required|string|unique:product,slug,' . $id,
                'description' => 'nullable|string',
                'price' => 'nullable|numeric|min:0',
                'link_video' => 'nullable|string',
                'link_tokopedia' => 'nullable|string',
                'is_show' => 'nullable|boolean',
                'is_popular' => 'nullable|boolean',
            ]);

            $product = Product::findOrFail($id);
            $product->update($validatedData);
            return response()->json($product, 200);

        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Resource not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to update resource', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json(['message' => 'Resource deleted'], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Resource not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete resource', 'message' => $e->getMessage()], 500);
        }
    }
}
