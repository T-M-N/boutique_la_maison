@extends('layouts.master')

@section('title')
Page des products en solde
@endsection

@section('content')
<div class="container">
  <div class="margin-top-1em col-md-8 offset-md-4 d-flex justify-content-around align-items-baseline">
    <div>{{ $products->links() }}</div>
    <div><p>{{ 'Nombre d\'articles : '.$products->total().' résultats' }}</p></div>
  </div>
    <div class="row">
      <div class="galery-product mx-auto">
      <div class="col-lg-12 col-md-6 col-sm-1">
        <ul>
          @forelse($products as $product)
            <li class="list-inline-item">
              @if($product->genre == 'femme')
                <a href="{{route('show_product', $product->id)}}"> <img  src="{{asset('images/femmes/'.$product->url_image)}}" class="femme img-responsive img-thumbnail"/></a>
                    @else
                <a href="{{route('show_product', $product->id)}}"> <img  src="{{asset('images/hommes/'.$product->url_image)}}" class="homme img-responsive img-thumbnail"/></a>
            @endif 
              <h2><a class="text-secondary" href="{{route('show_product', $product->id)}}">{{ $product->title }}</a></h2>
                <p>{{'Code produit : '.$product->code}}</p>
                <p>{{'Prix : '.$product->price}} &euro;</p>
            </li>
            @empty
            @endforelse
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection

