<?php

namespace App\Http\Controllers\v1\api;

use Exception;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BranchController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        try {
            $branches = Branch::all();
            return response()->json( $branches, 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred while retrieving the branches'], 500);
        }
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'branch' => 'required|string|max:255',
                'address' => 'required|string|max:1024',
                'wa' => 'required|regex:/^\+?\d{10,15}$/',
                'lat' => 'required|string|regex:/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])\.\d{1,6})$/',
                'lang' => 'required|string|regex:/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])\.\d{1,6})$/',
                'image' => 'required|image|max:2048'
            ]);
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $randomFileName = uniqid('brand_') . '.' . $file->extension();
                    $file->move(public_path('images/branch'), $randomFileName);
                    $validated['image'] = $randomFileName;
                }
            }
    
            $branch = Branch::create($validated);
            return response()->json(['message' => 'Branch created successfully', 'branch' => $branch], 201);
    
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to create the branch', 'message' => $e->getMessage()], 400);
        }
    }

    // Display the specified resource.
    public function show(string $id)
    {
        try {
            $branch = Branch::findOrFail($id);
            return response()->json($branch);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'branch not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while retrieving the branch.', 'message' => $e->getMessage()], 500);
        }
    }

    // Update the specified resource in storage.
    public function update(Request $request, Branch $branch)
    {
        try {
            $validated = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'branch' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:1024',
                'wa' => 'nullable|regex:/^\+?\d{10,15}$/',
                'lat' => 'nullable|string|regex:/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])\.\d{1,6})$/',
                'lang' => 'nullable|string|regex:/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])\.\d{1,6})$/',
                'image' => 'nullable|image|max:2048'
            ]);
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if(File::exists(public_path('images/branch/' . $branch->image))) {
                    File::delete(public_path('images/branch/' . $branch->image));
                }
                $randomFileName = uniqid('branch_') . '.' . $file->extension();
                $file->move(public_path('images/branch'), $randomFileName);
                $validated['image'] = $randomFileName;
            }
    
            $branch->update($validated);  
            return response()->json(['message' => 'Branch updated successfully', 'branch' => $branch], 200);
    
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to update the branch', 'message' => $e->getMessage()], 400);
        }
    }

    // Remove the specified resource from storage.
    public function destroy(Branch $branch)
    {
        try {
            $branch->delete();
            return response()->json(['message' => 'Branch deleted successfully'], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to delete the branch'], 500);
        }
    }
}
