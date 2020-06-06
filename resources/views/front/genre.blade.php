@extends('layouts.master')

@section('title')
Page par catégorie
@endsection

@section('content')

{{-- pagination de Laravel --}}
{{ $products->links() }}

<div class="container galery-product">
  <div class="row">
    <ul class="d-flex justify-content-between flex-wrap">
      @forelse($products as $product)
          <li class="list-inline-item  col-md-3">
            @if($product->genre == 'femme')   
            <a href="{{route('show_product', $product->id)}}"><img  src="{{asset('images/femmes/'.$product->url_image)}}" class="femme img-responsive img-thumbnail"/></a>
            @else
            <a href="{{route('show_product', $product->id)}}"><img  src="{{asset('images/hommes/'.$product->url_image)}}" class="homme img-responsive img-thumbnail"/></a>
            @endif 
        </li>  
      @empty
      @endforelse
    </ul>
  </div>
</div>
@endsection
