@extends('layouts.master')

@section('content')

<div class="container">
 <div class="offset-md-1">
  <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row">
 
    <div class="col-sm-7">
 <div class="form">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" />
                        @if($errors->has('title')) <span class="error bg-warning">{{ $errors->first('title')}}</span> @endif
                    </div>
                </div>
                <div class="form">
                    <div class="form-group">
                        <p><label for="title">Description</label></p>
                        <textarea name="description" id="description" cols="55" rows="5">{{ old('description') }}</textarea>
                        @if($errors->has('description')) <span class="error bg-warning">{{ $errors->first('description')}}</span> @endif
                    </div>
                </div>
                <div class="form">
                    <div class="form-group">
                        <label for="price">Prix</label>
                        <input type="text" name="price" value="{{ old('prices') }}" class="form-control" id="price" />
                        @if($errors->has('prices')) <span class="error bg-warning">{{ $errors->first('prices')}}</span> @endif
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
                        <label for="size">Taille</label>
                        <select name="sizes" id="size">
                            @foreach($sizes as $id=> $name)
                            <option {{ old('sizes') == $id ? 'selected' : null }} value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
</div>
<div class="col-sm-4">
             <div class="form">
                    <div class="form-group">
                        <h2>Status</h2>
                        <input {{ old('status') === 'published' ? 'checked' : null }} type="radio" name="status" value="published" /> Publier <br />
                        <input {{ old('status') === 'unpublished' ? 'checked' : null }} type="radio" name="status" value="unpublished" /> Dépublier
                    </div>
                </div>
                <div class="form">
                    <div class="form-group">
                        <label for="code">Code produit</label>
                        <select name="code" id="code">
                            @foreach($codes as $id=> $name)
                            <option {{ old('codes') == $id ? 'selected' : null }} value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form">
                    <div class="form-group">
                        <label for="reference">Référence</label>
                        <input type="text" name="reference" value="{{ old('reference') }}" class="form-control" id="reference" />
                        @if($errors->has('references')) <span class="error bg-warning">{{ $errors->first('references')}}</span> @endif
                    </div>
                </div>
                <div class="form">
                    <div class="form-group">
                        <h2>Fichier</h2>
                        <label for="file">Image</label>
                        <input type="file" name="url_image">
                        @if($errors->has('url_image')) <span class="error bg-warning">{{ $errors->first('url_image')}}</span> @endif
                    </div>
                </div>
</div>
    <div class="form-groupe">
       <button type="submit" class="btn btn-primary">Ajouter un produit</button>
    </div>

</form>
</div></div>
</div>
@endsection