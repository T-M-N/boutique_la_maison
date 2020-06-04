@extends('layouts.master')

@section('content')
<article>
<div class="col-md-12">
    <h1>{{ $product->title }}</h1>

    @if($product->genre == 'femme')
    <img  src="{{asset('images/femmes/'.$product->url_image)}}" class="femme img-responsive img-thumbnail"/>
         @else
    <img  src="{{asset('images/hommes/'.$product->url_image)}}" class="homme img-responsive img-thumbnail"/>
    @endif
    
    <h2>Description</h2>
    <p>{{ $product->description}}</p>
</div>

</article>
@endsection