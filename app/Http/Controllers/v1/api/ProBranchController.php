<?php

namespace App\Http\Controllers\v1\api;

use App\Http\Controllers\Controller;
use App\Models\BranchProduct;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class ProBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $branchProducts = BranchProduct::with('product')->where('branch_id',(int)$request->idbranch)->get();
            return response()->json($branchProducts);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $existingEntry = BranchProduct::where('product_id', $request->product_id)
            ->where('branch_id', $request->branch_id)
            ->first();

            if ($existingEntry) {
            return response()->json(['error' => 'Produk sudah ada!'], Response::HTTP_CONFLICT);
            }
            $branchProduct = BranchProduct::create($request->all());
            return response()->json($branchProduct, Response::HTTP_CREATED);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $branchProduct = BranchProduct::findOrFail($id);
            return response()->json($branchProduct);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $branchProduct = BranchProduct::findOrFail($id);
            $branchProduct->update($request->all());
            return response()->json($branchProduct);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $branchProduct = BranchProduct::findOrFail($id);
            $branchProduct->delete();
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
