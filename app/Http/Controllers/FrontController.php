<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontController extends Controller
{
    //Permet d'afficher toutes données dans http://127.0.0.1:8000/
    public function index(){
        $products = Product::all();
        return view('front.index', ['products' => $products]);
        
    }

}
