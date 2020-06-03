<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontController extends Controller
{
    //Permet d'afficher toutes données
    public function index(){
        return Product::all();
    }
}
