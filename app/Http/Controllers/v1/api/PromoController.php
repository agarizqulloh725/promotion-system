<?php

namespace App\Http\Controllers\v1\api;

use App\Models\Promo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $promos = Promo::all();
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
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'start_time' => 'required|date_format:Y-m-d\TH:i',
                'end_time' => 'required|date_format:Y-m-d\TH:i|after_or_equal:start_time',
                'discount' => 'required|numeric|between:0,99.99',
                'cashback' => 'required|numeric|between:0,99.99',
                'bonus' => 'required|numeric|between:0,99.99',
                'is_show' => 'required|boolean',
                'image' => 'nullable',
            ]);
            
            if ($request->hasFile('image')) {
                $file = $request->file('image')[0];
                if ($file->isValid()) {
                    $randomFileName = uniqid('promo_') . '.' . $file->extension();
                    $file->move(public_path('images/promo'), $randomFileName);
                    $validatedData['image'] = $randomFileName;
                }
            }  
            $promo = Promo::create($validatedData);
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
            $promo = Promo::findOrFail($id);
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
                'name' => 'required|string|max:255',
                'start_time' => 'required|date_format:Y-m-d\TH:i',
                'end_time' => 'required|date_format:Y-m-d\TH:i|after_or_equal:start_time',
                'discount' => 'required|numeric|between:0,99.99',
                'cashback' => 'required|numeric|between:0,99.99',
                'bonus' => 'required|numeric|between:0,99.99',
                'is_show' => 'required|boolean',
                'image' => 'nullable|array',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);            
            $promo = Promo::findOrFail($id);
            if(isset($request->image)){
                if(File::exists(public_path('images/promo/'. $promo->image))) {
                    File::delete(public_path('images/promo/'. $promo->image));
                }          
                if ($request->hasFile('image')) {
                    $file = $request->file('image')[0];  
                        $randomFileName = uniqid('promo_') . '.' . $file->extension();
                        $file->move(public_path('images/promo'), $randomFileName);
                        $validatedData['image'] = $randomFileName;
                }  
            } 
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
            $promo = Promo::findOrFail($id);
            $promo->delete();
            return response()->json(['message' => 'Resource deleted'], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Resource not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete resource', 'message' => $e->getMessage()], 500);
        }
    }
}
