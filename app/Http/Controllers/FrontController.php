<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontController extends Controller
{
    public function __construct(){
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('title', 'id');
            $view->with('categories', $categories);
        });
    }

    private $paginate = 6;
    private $paginateAuthor = 2;

    //Permet d'afficher toutes données dans http://127.0.0.1:8000/
    public function index(){
        $products = Product::with('category')->paginate($this->paginate);
        return view('front.index', ['products' => $products]);        
    }


     public function showSolde(){
        $products = Product::with('category')->where('code', 'solde')->paginate($this->paginate);
        return view('front.index', ['products' => $products]); 
        
    }
    
     public function showCategory(int $id){
        $category = Category::find($id) ;
        $products = $category->with('products')->paginate( $this->paginateAuthor );
        
        return view('front.genre', ['products' => $products]); 
    }

}