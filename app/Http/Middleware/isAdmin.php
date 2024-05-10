<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\RoleHasPermissions;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->hasCookie('access_token')) {
            return redirect('/login');
        }

        $token = $request->cookie('access_token');
        $pat = PersonalAccessToken::findToken($token);
    
        if (!$pat) {
            return redirect('/login');
        }
    
        $user = User::find($pat->tokenable_id);  
        if (!$user) {
            return redirect('/');
        }
    
        $role = RoleHasPermissions::where('user_id', $user->id)->first();
        if (!$role) {
            return redirect('/');
        }
    
        $permission = Permission::find($role->permission_id);
        if (!$permission) {
            return redirect('/');
        }
    
        if ($permission->name === "super_admin" || $permission->name === "admin") {
            return $next($request);
        } else {
            return redirect('/');
        }
    }    
}
