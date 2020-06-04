@extends('layouts.master')

@section('title')
Page des products
@endsection

@section('content')

<div class="container galery-product">
{{ $products->links() }}
  <div class="row">
    <div class="col-lg-12 col-md-6 col-sm-1">
    <ul>
     @forelse($products as $product)
    <li class="list-inline-item">
    @if($product->genre == 'femme')
    <img  src="{{asset('images/femmes/'.$product->url_image)}}" class="femme img-responsive img-thumbnail"/>
         @else
    <img  src="{{asset('images/hommes/'.$product->url_image)}}" class="homme img-responsive img-thumbnail"/>
   
     @endif 
  
     <h2>{{ $product->title }}</h2>
     <p>{{$product->price}} &euro;</p>
    </li>
    
      @empty
      @endforelse
    </ul>
    </div>
</div>
</div>



@endsection

