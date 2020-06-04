
@extends('layouts.master')

@section('title')
Page des products
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
        @include('partials.menu')
        </div>
    </div>
{{-- pagination de Laravel --}}
{{ $products->links() }}

<div class="container galery-product">
  <div class="row">


    <ul class="d-flex justify-content-between flex-wrap">

    @forelse($products as $product)
        <li class="list-inline-item  col-md-3">
        @if($product->genre == 'femme')   
        <img  src="{{asset('images/femmes/'.$product->url_image)}}" class="femme img-responsive img-thumbnail"/>
        @else
        <img  src="{{asset('images/hommes/'.$product->url_image)}}" class="homme img-responsive img-thumbnail"/>
        @endif 
    </li>
    
      @empty
      @endforelse
    </ul>

</div>
</div>



@endsection
