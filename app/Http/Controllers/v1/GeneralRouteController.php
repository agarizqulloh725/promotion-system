<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
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
        return view('v1.backend.pages.dashboard');
    }
    public function ProCategory(){
        return view('v1.backend.pages.proCategory.index');
    }
    public function adminBrand(){
        $category = ProductCategory::all();
        return view('v1.backend.pages.brand.index',compact('category'));
    }
    public function adminPromo(){
        $category = ProductCategory::all();
        return view('v1.backend.pages.promo.index',compact('category'));
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
