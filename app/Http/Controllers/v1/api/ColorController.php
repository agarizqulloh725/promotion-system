<?php

namespace App\Http\Controllers\v1\api;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $colors = Color::all();
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
                'name' => 'required|string',
                'image' => 'nullable',
                'code' => 'nullable|string',
            ]);
            if ($request->hasFile('image')) {
                $file = $request->file('image')[0];
                if ($file->isValid()) {
                    $randomFileName = uniqid('color_') . '.' . $file->extension();
                    $file->move(public_path('images/color'), $randomFileName);
                    $validatedData['image'] = $randomFileName;
                }
            }    

            $color = Color::create($validatedData);
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
            $color = Color::findOrFail($id);
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
                'name' => 'required|string',
                'image' => 'nullable',
                'code' => 'nullable|string',
            ]);
            $color = Color::findOrFail($id);
            if(isset($request->image)){
                if(File::exists(public_path('images/color/'. $color->image))) {
                    File::delete(public_path('images/color/'. $color->image));
                }          
                if ($request->hasFile('image')) {
                    $file = $request->file('image')[0];  
                        $randomFileName = uniqid('color_') . '.' . $file->extension();
                        $file->move(public_path('images/color'), $randomFileName);
                        $validatedData['image'] = $randomFileName;
                }  
            } 
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
            $color = Color::findOrFail($id);
            if(File::exists(public_path('images/color/'. $color->image))) {
                File::delete(public_path('images/color/'. $color->image));
            }
            $color->delete();
            return response()->json(['message' => 'Resource deleted'], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Resource not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete resource', 'message' => $e->getMessage()], 500);
        }
    }
}
