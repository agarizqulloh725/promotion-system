<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralRouteController extends Controller
{
    public function homePage(){
        return view('/');
    }
    public function login(){
        return view('v1.auth.login');
    }
    public function register(){
        return view('v1.auth.register');
    }
}
