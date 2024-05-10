<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralRouteController extends Controller
{
    // auth
    public function login(){
        return view('v1.auth.login');
    }
    public function register(){
        return view('v1.auth.register');
    }
    public function testToken()
    {
        return view('v1.auth.me');
    }
    //admin
    public function adminDashboard(){
        return view('v1.backend.dashboard');
    }
    //all user 
    public function homePage(){
        return view('v1.frontend.pages.homepage');
    }
    public function product()
    {
        return view('v1.frontend.pages.product');
    }
    public function promo()
    {
        return view('v1.frontend.pages.promo');
    }
    public function about()
    {
        return view('v1.frontend.pages.about');
    }
    public function branch()
    {
        return view('v1.frontend.pages.branch');
    }
    public function profile()
    {
        return view('v1.frontend.pages.profile');
    }
}
