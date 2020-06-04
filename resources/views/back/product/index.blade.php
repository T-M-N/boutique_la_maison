@extends('layouts.master')

@section('content')

 <div class="row">
        <div class="col-md-12">
        @include('partials.admin')
        </div>
    </div>
<p><a href="{{route('product.create')}}"><button type="button" class="btn btn-primary btn-lg">Ajouter un produit</button></a></p>
{{$products->links()}}

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Catégorie</th>
            <th>Prix</th>
            <th>Statut</th>
            <th>Mettre à jour</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td><a href="">{{$product->title}}</a></td>

            <td>
              {{$product->genre}}
            </td>
             <td>
              {{$product->price}}
            </td>
             <td>
                @if($product->status == 'published')
                <p>Publié</p>
                @else
                <p>Non publié</p>
                @endif
            </td>
            <td>
             <a class="btn btn-primary" href="{{route('product.edit')}}">Edit</a></td>
           </td>
             <td>
                <form class="delete" method="POST" action="">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger" type="submit" value="delete">
                </form>
            </td>
          
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
{{$products->links()}}
@endsection
