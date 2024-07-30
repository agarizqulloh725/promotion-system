<?php

namespace App\Http\Controllers\v1\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RoleHasPermissions;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::with('rolePermissions.permissions')->get();
            return response()->json($users, 200);
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
                'branch_id' => 'nullable',
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|min:6',
                'image' => 'nullable',
            ]);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $randomFileName = uniqid('user_') . '.' . $file->extension();
                    $file->move(public_path('images/user'), $randomFileName);
                    $validatedData['image'] = $randomFileName;
                }
            }  

            $validatedData['password'] = Hash::make($validatedData['password']);

            $user = User::create($validatedData);
            if($user){
                RoleHasPermissions::create([
                    'user_id' => $user->id,
                    'permission_id' => $request->permission_id
                ]);
            }
            return response()->json($user, 201);

        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to create user', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::with('rolePermissions.permissions')->findOrFail($id);
            return response()->json($user, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'User not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch user', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'branch_id' => 'nullable',
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users,email,' . $id,
                'password' => 'nullable|string|min:6',
                'image' => 'nullable',
            ]);

            if (isset($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }
            $user = User::findOrFail($id);
            $role = RoleHasPermissions::where('user_id',$user->id)->first();
            if($request->permission_id !== $role->permission_id){
                $role->update([
                    'permission_id' => $request->permission_id
                ]);
            }
            if(isset($validatedData['image'])){
                if(File::exists(public_path('images/user/'. $user->image))) {
                    File::delete(public_path('images/user/'. $user->image));
                }          
                if ($request->hasFile('image')) {
                    $file = $request->file('image');  
                        $randomFileName = uniqid('user_') . '.' . $file->extension();
                        $file->move(public_path('images/user'), $randomFileName);
                        $validatedData['image'] = $randomFileName;
                }  
            } 
            $user->update($validatedData);
            return response()->json($user, 200);

        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'User not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to update user', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            if(File::exists(public_path('images/user/'. $user->image))) {
                File::delete(public_path('images/user/'. $user->image));
            }  
            $role = RoleHasPermissions::where('user_id',$user->id)->first();
            $role->delete();
            $user->delete();
            return response()->json(['message' => 'User deleted successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'User not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete user', 'message' => $e->getMessage()], 500);
        }
    }
}
