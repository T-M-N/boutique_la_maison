<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function __construct(){
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('title', 'id');
            $view->with('categories', $categories);
        });
        
    }

    
private $paginate = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
    //    return "Admin Book";
            $products = Product::paginate($this->paginate);
            return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('create');
        $categories = Category::pluck('title', 'id');
        $prices = Product::pluck('price', 'id');
        $sizes = Product::pluck('size', 'id'); 
        $codes = Product::pluck('code', 'id'); 
        $references = Product::pluck('reference', 'id'); 
         return view('back.product.create', [
            'categories' => $categories,
            'prices' => $prices,
            'sizes'=>$sizes,
            'codes'=>$codes,
            'references'=>$references
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('store');
        //  $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'price' => 'integer',
        //     'size' => 'integer',
        //     'category_id' => 'integer',
        //     'reference' => 'required',            
        //     'status' => 'in:published,unpublished',
        //     'picture' => 'image|max:3000'
        // ]);
        
        $product = Product::create($request->all());

       
        $product->genre = $request->category_id == 1 ? "homme" : "femme";

        if ($request->file('url_image')) {

            $genre = $product->genre.'s';
            
            $link = $request->file('url_image')->store($genre);
        
            $link = substr($link, strlen($genre));
            $product->url_image = $link;

        }

        $product->genre = $request->category_id == 1 ? "homme" : "femme";

        $product->save();
        return redirect()->route('admin.index');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Product $product)
    {
       $categories = Category::pluck('title', 'id');
        $sizes = Product::pluck('size'); 
        $codes = Product::pluck('code'); 

        $product = Product::find($id);
        return view('back.product.edit', compact('product', 'id', "codes", "categories", 'sizes')); 

        return redirect()->route('admin.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
           $request->validate([
            'title' => 'required',
            
        ]);

        // $product->update($request->all());

        // $product->save();
        // return redirect()->route('/admin');

        $product->update($request->all());
     

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function uploadPicture($product, $request):void{

            $this->deletePicture($product);
            $link = $request->file('url_image')->store('');
            $product->url_image->create();
    }
}
