<?php

namespace App\Http\Controllers\v1;

use App\Models\Color;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Permission;
use App\Models\ProductColor;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use App\Models\Specification;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Brand;
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
        $product = Product::count();
        $branch = Branch::count();        
        $stock = DB::table('product_stock')->sum('stock');
        return view('v1.backend.pages.dashboard', compact(['product','branch','stock']));
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
        $branch =  DB::table('branch')->select('branch.name')->where('id', $branch)->first();
        // return $branch;
        return view('v1.backend.pages.stock.product',compact(['product','totalStock','branch']));
    }
    public function adminShowStockProduct($branch,$product){
        $specification = Specification::all();
        $totalStock = DB::table('product_stock')->where('product_id', $product)->where('branch_id',$branch)->sum('stock');
        $branch = DB::table('branch')->select('name')->where('id', $branch)->first();
        $product = DB::table('product')->select('name')->where('id', $product)->first();
        return view('v1.backend.pages.stock.specification', compact(['specification', 'totalStock', 'product', 'branch']));

    }
    public function adminShowStockSpecification($branch,$product,$specification){
        // dd($specification);
        $specificationn = Specification::all();
        $productt = Product::all();
        $color = Color::all();
        $totalStock = DB::table('product_stock')->where('product_id', $product)->where('product_specification_id', $specification)->sum('stock');
        $branch = DB::table('branch')->select('name')->where('id', $branch)->first();
        $prd = DB::table('product')->select('name')->where('id', $product)->first();
        $spec = DB::table('specification')->select('name')->where('id', $specification)->first();

        return view('v1.backend.pages.stock.color', compact(['specificationn','productt','color','totalStock', 'branch', 'prd', 'spec']));
    }
    public function adminProduct(){
        $category = ProductCategory::all();
        $brand = Brand::all();
        return view('v1.backend.pages.product.index',compact(['category', 'brand']));
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
    public function productBicycle(){
        return view('v1.frontend.pages.product-bicycle');
    }
    public function productBicycleShow($id){
        $product = Product::find($id);
        if ($product) {
            $product->increment('is_popular');
            $product->save();
        }
        $product = ProductStock::select(
            'product_stock.product_id',
            'product.name',
            'product.price',
            'product.description',
        )
        ->where('product_stock.product_id', $id)
        ->join('product', 'product.id', '=', 'product_stock.product_id')
        ->groupBy( 'product_stock.product_id', 'product.name', 'product.price', 'product.description')
        ->get()
        ->map(function($v)use($id){
            $spec = Specification::select(
                'product_specification.id as spec_id',
                'specification.name as spec_name',
            )
            ->leftjoin('product_specification', 'product_specification.specification_id', '=' ,'specification.id')
            ->where('product_specification.product_id', $id)
            ->get()
            ->map(function($k)use($id){
                $col = Color::select(
                    'color.name as color_name',
                    'color.image as color_image',
                )
                ->join('product_color', 'product_color.color_id', '=' ,'color.id')
                ->join('product_specification as a', 'a.id', '=' ,'product_color.product_specification_id')
                ->where('product_color.product_specification_id', $k->spec_id)
                ->get();
                
                return [
                    "id"=>$k->spec_id,
                    "spec_name"=>$k->spec_name,
                    "col"=>$col,
                ];
            });


            return [
                "id"=>$v->product_id,
                "name"=>$v->name,
                "price"=>$v->price,
                "description"=>$v->description,
                "spec"=>$spec,
            ];
        });

        // return $product;
        return view('v1.frontend.pages.product.show',  compact('product'));
    }
    public function productShow(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->increment('is_popular');
            $product->save();
        }
        return view('v1.frontend.pages.product.show',  compact('id'));
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
        $branch = Branch::all();
        return view('v1.frontend.pages.branch', compact('branch'));
    }
    public function profile()
    {
        return view('v1.frontend.pages.profile');
    }
    public function noakses(){
        return view('v1.badview');
    }
}
