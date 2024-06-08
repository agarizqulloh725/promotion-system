<?php

namespace App\Http\Controllers\v1\api;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $brands = Brand::with('productCategory')->get();
            return response()->json($brands);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching brands.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'product_category_id' => 'nullable|exists:product_category,id',
                'name' => 'required|string|max:255',
                'image' => 'nullable',
                'description' => 'nullable|string',
                'is_show' => 'nullable|boolean',
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image[0]');
                if ($file->isValid()) {
                    $randomFileName = uniqid('brand_') . '.' . $file->extension();
                    $file->move(public_path('images/brand'), $randomFileName);
                    $validated['image'] = $randomFileName;
                }
            }            
            $brand = Brand::create($validated);
            return response()->json($brand, 201);

        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'message' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while creating the brand.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $brand = Brand::with('productCategory')->findOrFail($id);
            return response()->json($brand);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Brand not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while retrieving the brand.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'product_category_id' => 'nullable|exists:product_category,id',
                'name' => 'required|string|max:255',
                'image' => 'nullable',
                'description' => 'nullable|string',
                'is_show' => 'nullable|boolean',
            ]);

            $brand = Brand::findOrFail($id);
            if(isset($request->image)){
                if(File::exists(public_path('images/brand/'. $brand->image))) {
                    File::delete(public_path('images/brand/'. $brand->image));
                }          
                if ($request->hasFile('image')) {
                    $file = $request->file('image')[0];  
                        $randomFileName = uniqid('brand_') . '.' . $file->extension();
                        $file->move(public_path('images/brand'), $randomFileName);
                        $validated['image'] = $randomFileName;
                }  
            } 
            $brand->update($validated);
            return response()->json($brand);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Brand not found', 'message' => $e->getMessage()], 404);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'message' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the brand.', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $brand = Brand::findOrFail($id);
            if(File::exists(public_path('images/brand/'. $brand->image))) {
                File::delete(public_path('images/brand/'. $brand->image));
            }
            $brand->delete();

            return response()->json(['message' => 'Brand deleted successfully']);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Brand not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the brand.', 'message' => $e->getMessage()], 500);
        }
    }
}
