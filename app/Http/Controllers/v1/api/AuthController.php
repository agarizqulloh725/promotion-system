<?php

namespace App\Http\Controllers\v1\api;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\RoleHasPermissions;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Cookie;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        RoleHasPermissions::create([
            'user_id' => $user->id,
            'permission_id' => Permission::where('name', 'user')->first()->id
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User registered successfully',
            'user' => $user,
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal Validasi',
                'errors' => $validator->errors()
            ], 422);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            $emailExists = User::where('email', $request->input('email'))->exists();
            
            if (!$emailExists) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Email Tidak Terdaftar',
                ], 401);
            }
        
            return response()->json([
                'status' => 'error',
                'message' => 'Password anda salah',
            ], 401);
        }
        $user = Auth::user();

        $token = $user->createToken('auth_token')->plainTextToken;
        $cookieName = 'access_token';
        $cookieLifetime = 60 * 24;
    
        $cookie = Cookie::create($cookieName)
            ->withValue($token)
            ->withExpires(time() + (60 * $cookieLifetime))
            ->withPath('/')
            ->withHttpOnly(false)
            ->withSameSite(Cookie::SAMESITE_LAX);
    
            $role = RoleHasPermissions::where('user_id', $user->id)->first();
            $permission = Permission::find($role->permission_id);
            $url = '';
    
            if ($permission->name === 'super_admin' || $permission->name === 'admin') {
                $url = '/admin/dashboard';
            } else {
                $url = '/';
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
                'token' => $token,
                'url' => $url
            ])->withCookie($cookie);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logout successful',
        ]);
    }
    public function userCheck()
    {
        $user = Auth::user();
    
        if (!$user) {
            return response()->json([
                'status' => 'failed',
                'message' => 'User not authenticated'
            ], 401);
        }
    
        $role = RoleHasPermissions::where('user_id', $user->id)->first();
    
        if (!$role) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Role not found'
            ], 404);
        }
    
        $permission = Permission::find($role->permission_id);
    
        if (!$permission) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Permission not found'
            ], 404);
        }
    
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'role' => bcrypt($role->id),
            'permission' => $permission->name
        ]);
    }
}
