<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
         $genres = Product::pluck('genre');
        $prices = Product::pluck('price', 'id');
        $sizes = Product::pluck('size', 'id'); 
        $codes = Product::pluck('code', 'id'); 
        $references = Product::pluck('reference', 'id'); 
         return view('back.product.create', [
            'categories' => $categories,
            'genres' => $genres,
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

      

        if ($request->file('url_image')) {

            $link = $request->file('url_image')->store('');

            $product->url_image()->create();
        }
     
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
    public function edit(Product $product)
    {
        $categories = Category::pluck('title', 'id');
        $genres = Product::pluck('genre');
        $prices = Product::pluck('price', 'id');
        $sizes = Product::pluck('size', 'id'); 
        $codes = Product::pluck('code', 'id'); 
        $references = Product::pluck('reference', 'id'); 
         return view('back.product.edit', [
            'product'=>$product,
            'categories' => $categories,
            'genres'=>$genres,
            'prices' => $prices,
            'sizes'=>$sizes,
            'codes'=>$codes,
            'references'=>$references
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $product->update($request->all());

       
        // $book->authors()->sync($request->authors);

        // if ($request->delete_picture) {
        //     $this->deletePicture($product);
        // }

        // if($request->file('url_image')){
        //     $this->uploadPicture($product, $request);
        // }
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
            $product->url_image()->create();
    }
}
