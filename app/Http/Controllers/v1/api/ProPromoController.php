<?php

namespace App\Http\Controllers\v1\api;

use App\Http\Controllers\Controller;
use App\Models\ProductPromo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class ProPromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $promos = ProductPromo::all();
            return response()->json($promos, 200);
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
                'product_id' => 'nullable|exists:product,id',
                'name' => 'nullable|string',
                'discount' => 'nullable|numeric',
                'cashback' => 'nullable|numeric',
                'bonus' => 'nullable|numeric',
                'promo_front' => 'nullable',
                'promo_start' => 'nullable',
                'promo_end' => 'nullable',
                'img1' => 'nullable',
                'img2' => 'nullable',
                'spec_array' => 'nullable',
            ]);

            if ($request->hasFile('img1')) {
                $file = $request->file('img1');  
                $randomFileName = uniqid('homePromo_') . '.' . $file->extension();
                $file->move(public_path('images/homepromo'), $randomFileName);
                $validatedData['img1'] = $randomFileName;
            }
            if ($request->hasFile('img2')) {
                $file = $request->file('img2');  
                $randomFileName = uniqid('homePromo_') . '.' . $file->extension();
                $file->move(public_path('images/homepromo'), $randomFileName);
                $validatedData['img2'] = $randomFileName;
            }  

            if (!empty($validatedData['product_id']) && ProductPromo::where('product_id', $validatedData['product_id'])->exists()) {
                return response()->json(['error' => 'Product sudah terdaftar', 'message' => 'A promo for this product already exists.'], 409);
            }

            if (!empty($validatedData['promo_front'])) {
                ProductPromo::whereNotNull('promo_front')->update(['promo_front' => null]);
            }

            $promo = ProductPromo::create($validatedData);
            return response()->json($promo, 201);
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
            $promo = ProductPromo::findOrFail($id);
            return response()->json($promo, 200);
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
                'product_id' => 'nullable|exists:product,id',
                'name' => 'nullable|string',
                'discount' => 'nullable|numeric',
                'cashback' => 'nullable|numeric',
                'bonus' => 'nullable|numeric',
                'promo_front' => 'nullable',
                'promo_start' => 'nullable',
                'promo_end' => 'nullable',
                'img1' => 'nullable',
                'img2' => 'nullable',
                'spec_array' => 'nullable',
            ]);
            
            if (!empty($validatedData['promo_front'])) {
                ProductPromo::whereNotNull('promo_front')->update(['promo_front' => null]);
            }

            $promo = ProductPromo::findOrFail($id);
            $promo->update($validatedData);
            return response()->json($promo, 200);
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
            $promo = ProductPromo::findOrFail($id);
            $promo->delete();
            return response()->json(['message' => 'Resource deleted'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Resource not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete resource', 'message' => $e->getMessage()], 500);
        }
    }
}
