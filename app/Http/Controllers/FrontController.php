<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontController extends Controller
{
    public function index(int $id){
        return Product::find($id);
    }
}
