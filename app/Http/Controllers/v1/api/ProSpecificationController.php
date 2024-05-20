<?php

namespace App\Http\Controllers\v1\api;

use Illuminate\Http\Request;
use App\Models\BranchProduct;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductSpecification;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProSpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $idBranch = (int) $request->idbranch;
        $idBranchProduct = (int) $request->idbranchproduct;
        try {
            if(isset($idBranch) && isset($idBranchProduct)){
                $product = DB::table('branch_product')->where('id',$idBranchProduct)->first();
                $specifications = DB::table('product_specification')->where('product_id', $product->product_id)
                ->where('branch_product_id', $idBranchProduct)
                ->get();

            }else{
                $specifications = ProductSpecification::all();
            }
            return response()->json($specifications, 200);
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
            $product = DB::table('branch_product')->where('id',(int) $request->branch_product_id)->first();
            $validatedData = $request->validate([
                'specification_id' => 'nullable|exists:specification,id',
                'branch_product_id' =>'nullable',
                'name' => 'required|string',
                'price' => 'nullable|numeric',
                'description' => 'nullable|string',
            ]);
            $validatedData['product_id'] = $product->product_id;

            $tamp = BranchProduct::findOrFail($request['branch_product_id']);
            $exists = ProductSpecification::where('product_id', $tamp->product_id)
            ->where('specification_id', $validatedData['specification_id'])->where('branch_product_id', $validatedData['branch_product_id'])
            ->exists();

            if ($exists) {
                return response()->json(['error' => 'Produk sudah ada!'], Response::HTTP_CONFLICT);
            }

            $specification = ProductSpecification::create($validatedData);
            return response()->json($specification, 201);

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
            $specification = ProductSpecification::findOrFail($id);
            return response()->json($specification, 200);
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
                'specification_id' => 'nullable|exists:specification,id',
                'name' => 'required|string',
                'harga' => 'nullable|numeric',
                'description' => 'nullable|string',
            ]);

            $specification = ProductSpecification::findOrFail($id);
            $specification->update($validatedData);
            return response()->json($specification, 200);

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
            $specification = ProductSpecification::findOrFail($id);
            $specification->delete();
            return response()->json(['message' => 'Resource deleted'], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Resource not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete resource', 'message' => $e->getMessage()], 500);
        }
    }
}
