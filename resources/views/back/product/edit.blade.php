@extends('layouts.master')

@section('content')

<div class="container">
 <div class="offset-md-1">
 <form action="{{route('admin.update', $product->id)}}" method="HEAD" enctype="multipart/form-data">
   {{csrf_field()}}
    <div class="row">
    <input type="hidden" name="_method" value="UPDATE"/>
    <div class="col-sm-7">

                <div class="form">
                     <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" name="title" value="{{ $product->title }}" class="form-control" id="title" />
                        @if($errors->has('title')) <span class="error bg-warning">{{ $errors->first('title')}}</span> @endif
                    </div>
                </div>
              
                <div class="form">
                    <div class="form-group">
                        <p><label for="title">Description</label></p>
                        <textarea name="description" id="description"  cols="55" rows="5">{{ $product->description }}</textarea>
                        @if($errors->has('description')) <span class="error bg-warning">{{ $errors->first('description')}}</span> @endif
                    </div>
                </div>
               

             <div class="form">
                    <div class="form-group">
                        <label for="price">Prix</label>
                        <input type="text" name="price" value="{{$product->price}}" class="form-control" id="price" />
                        @if($errors->has('prices')) <span class="error bg-warning">{{ $errors->first('prices')}}</span> @endif
                    </div>
                </div> 

                
                 <div class="form">
                    <div class="form-group">
                        <label for="categorie">Catégorie</label>
                        <select name="category_id" id="categorie">
                            @foreach($categories as $id=> $name)
                            <option {{$product->categories == $id ? 'selected' : null }} value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
               </div>
                <div class="form">
                    <div class="form-group">
                        <label for="size">Taille</label>
                        <select name="size" id="size">
                            @foreach($sizes as $id=> $name)
                            <option {{$product->size == $id ? 'selected' : null }} value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>      
</div>
<div class="col-sm-4">
            <div class="form">
                <div class="form-group">
                    <h2>Status</h2>
                    <input {{ $product->status === 'published' ? 'checked' : null }} type="radio" name="status" value="published" /> Publier <br />
                    <input {{ $product->status === 'unpublished' ? 'checked' : null }} type="radio" name="status" value="unpublished" /> Dépublier
                </div>
            </div>
               <div class="form">
                    <div class="form-group">
                        <label for="code">Code produit</label>
                        <select name="code" id="code">
                            @foreach($codes as $id=> $name)
                            <option {{ $product->code == $id ? 'selected' : null }} value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form">
                    <div class="form-group">
                        <label for="reference">Référence</label>
                        <input type="text" name="reference" value="{{ $product->reference }}" class="form-control" id="reference" />
                        @if($errors->has('references')) <span class="error bg-warning">{{ $errors->first('references')}}</span> @endif
                    </div>
                </div>
</div>
    <div class="form-groupe">
       <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </div>

</form>
</div></div>
</div>
@endsection