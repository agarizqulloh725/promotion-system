<?php

namespace App\Http\Controllers\v1\api;

use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class ProColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $idBranch = (int) $request->idbranch;
        $idProduct = (int) $request->idproduct;
        try {
            if(isset($idBranch) && isset($idProduct)){
                $colors = ProductColor::with('color')->where('branch_product_id', $idBranch)->where('product_id',$idProduct )->get();
            }else{
                $colors = ProductColor::all();
            }
            return response()->json($colors, 200);
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
                'branch_product_id' => 'required',
                'product_id' => 'nullable',
                'color_id' => 'nullable',
            ]);

            $existingColor = ProductColor::where('branch_product_id', $validatedData['branch_product_id'])
            ->where('product_id', $validatedData['product_id'])
            ->first();

            if ($existingColor) {
            return response()->json(['error' => 'A product color with the same branch product ID and product ID already exists'], 409);
            }

            $color = ProductColor::create($validatedData);
            $productStock = ProductStock::create([
                'product_specification_id' => $request['product_specification_id'],
                'product_color_id' => $color->id,
                'branch_product_id' => $validatedData['branch_product_id'],
                'product_id' => $validatedData['product_id'],
                'stock' => $request['stock'],
            ]);
            return response()->json($color, 201);

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
            $color = ProductColor::findOrFail($id);
            return response()->json($color, 200);
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
                'branch_product_id' => 'required',
                'color_id' => 'nullable',
            ]);

            $color = ProductColor::findOrFail($id);
            $color->update($validatedData);
            return response()->json($color, 200);

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
            $color = ProductColor::findOrFail($id);
            $color->delete();
            return response()->json(['message' => 'Resource deleted'], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Resource not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete resource', 'message' => $e->getMessage()], 500);
        }
    }
}
