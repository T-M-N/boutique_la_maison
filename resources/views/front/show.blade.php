@extends('layouts.master')

@section('content')
<br/>
<article>
<div class="col-md-12">    
<div class="row">
  <div class="col-sm-8">
    
    @if($product->genre == 'femme')
    <img  src="{{asset('images/femmes/'.$product->url_image)}}" class="femme img-responsive img-thumbnail"/>
         @else
    <img  src="{{asset('images/hommes/'.$product->url_image)}}" class="homme img-responsive img-thumbnail"/>
    @endif

<div class="description col-lg-10">
    <h2>Description</h2>
    <p>{{ $product->description}}</p>
</div>

  </div>
  <div class="col-sm-4">
  <h1>{{ $product->title }}</h1>
  <p>{{ 'Référence : '.$product->reference }}</p>
  <p>{{$product->price}}  &euro;</p>



<select class="form-control" name="item_id">
    @foreach($size as $item)
      <option value="{{$item->id}}" @if($area->id==$item->id) selected @endif>{{$item->size}}</option>
    @endforeach
  </select>


  

  </div>
</div>

</div>

</article>
@endsection