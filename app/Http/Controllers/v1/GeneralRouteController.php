<?php

namespace App\Http\Controllers\v1;

use App\Models\Color;
use App\Models\Product;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Specification;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductSpecification;
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
    public function adminUser(){
        $permissions = Permission::all();
        return view('v1.backend.pages.user.index',compact('permissions'));
    }
    public function adminProductPromo(){
        $product = Product::all();
        return view('v1.backend.pages.proPromo.index',compact('product'));
    }
    public function adminSpesification(){
        $category = ProductCategory::all();
        return view('v1.backend.pages.spesification.index',compact('category'));
    }
    public function adminBranch(){
        $category = ProductCategory::all();
        return view('v1.backend.pages.branch.index',compact('category'));
    }
    public function adminStock(){
        return view('v1.backend.pages.stock.branch');
    }
    public function adminShowStockBranch($branch){
        $product = Product::all();
        $totalStock = DB::table('product_stock')->where('branch_id', $branch)->sum('stock');
        return view('v1.backend.pages.stock.product',compact(['product', 'totalStock']));
    }
    public function adminShowStockProduct($branch,$product){
        $specification = Specification::all();
        $totalStock = DB::table('product_stock')->where('product_id', $product)->where('branch_id',$branch)->sum('stock');
        return view('v1.backend.pages.stock.specification', compact(['specification', 'totalStock']));
    }
    public function adminShowStockSpecification($branch,$product,$specification){
        // dd($specification);
        $specificationn = Specification::all();
        $productt = Product::all();
        $color = Color::all();
        $totalStock = DB::table('product_stock')->where('product_id', $product)->where('product_specification_id', $specification)->sum('stock');
        return view('v1.backend.pages.stock.color', compact(['specificationn','productt','color','totalStock']));
    }
    public function adminProduct(){
        $category = ProductCategory::all();
        return view('v1.backend.pages.product.index',compact('category'));
    }
    public function adminColor(){
        $category = ProductCategory::all();
        return view('v1.backend.pages.color.index',compact('category'));
    }
    //all user 
    public function homePage(){
        return view('v1.frontend.pages.homepage');
    }
    public function product()
    {
        return view('v1.frontend.pages.product');
    }
    public function productShow()
    {
        return view('v1.frontend.pages.product.show');
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
