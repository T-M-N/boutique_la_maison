@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
       <div class="offset-md-1 col-sm-7"> 
            @if ($errors->any())
            <div class="alert alert-danger">
                <p>Vérifier le formulaire il comporte des erreurs !</p>
            </div>
            @endif
            {{--
                route + method => Laravel connecte à la bonne action dans le contrôleur de ressource 
            --}}
            <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                        <label for="categorie">Catégorie</label>
                        <select name="category_id" id="categorie">
                            @foreach($categories as $id=> $name)
                            <option {{ old('category_id') == $id ? 'selected' : null }} value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

             <div class="form">
                    <div class="form-group">
                        <label for="price">Prix</label>
                        <input type="text" name="price" value="{{ old('prices') }}" class="form-control" id="price" />
                        @if($errors->has('prices')) <span class="error bg-warning">{{ $errors->first('prices')}}</span> @endif
                    </div>
                </div> 
                 <button type="submit" class="btn btn-primary">Mettre à jour</button>
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
                        <label for="size">Taille</label>
                        <select name="sizes" id="size">
                            @foreach($sizes as $id=> $name)
                            <option {{ $product->genre == $id ? 'selected' : null }} value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
           
     </div>
    </div>
    </form>
</div>
@endsection