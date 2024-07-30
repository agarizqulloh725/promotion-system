<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\RoleHasPermissions;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class isSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
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
    
        if ($permission->name === "super_admin") {
            return $next($request);
        } else {
            return redirect('/no-akses');
        }
    }    
}
