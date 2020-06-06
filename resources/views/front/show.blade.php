@extends('layouts.master')

@section('content')
<br/>
<article>
  <div class="col-md-12">    
      <div class="row">
        <div class="col-sm-8">          
            @if($product->genre == 'femme')
            <a href="{{route('show_product', $product->id)}}"><img  src="{{asset('images/femmes/'.$product->url_image)}}" class="femme img-responsive img-thumbnail"/></a>
                  @else
            <a href="{{route('show_product', $product->id)}}"><img  src="{{asset('images/hommes/'.$product->url_image)}}" class="homme img-responsive img-thumbnail"/></a>
            @endif
          <div class="description col-lg-10">
            <h2>Description</h2>
            <p>{{ $product->description}}</p>
          </div>
        </div>
        <div class="col-sm-4">
            <h1>{{ $product->title }}</h1>
            <br/>
            <p>{{ 'Référence : '.$product->reference }}</p>
            <p>{{'Code produit : '.$product->code}}</p>
            <p>{{'Prix : '.$product->price}}  &euro;</p>
            <form>
            <label for="isze">Taille :</label>
            <select id="size" class="form-control">
              @foreach($size as $item)
                <option value="{{$item->id}}" @if($area->id==$item->id) selected @endif>{{$item->size}}</option>
              @endforeach
            </select>
            </form>
        </div>
      </div>
  </div>
</article>
@endsection