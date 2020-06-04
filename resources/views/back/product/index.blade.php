@extends('layouts.master')

@section('content')

<p><a href=""><button type="button" class="btn btn-primary btn-lg">Ajouter un livre</button></a></p>
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
                <form class="delete" method="POST" action="">
                    @method('DELETE')
                    {{--
                token de sécurité qui permet de sécuriser les formulaires 
                si ce token n'est pas présent Laravel ne traitera pas le formulaire permet d'éviter les attaques csrf ou 
                attaque par formulaire 
                --}}
                    @csrf
                    <input class="btn btn-primary" type="submit" value="delete">
                </form>
            </td>
             <td>
                <form class="delete" method="POST" action="">
                    @method('DELETE')
                    {{--
                token de sécurité qui permet de sécuriser les formulaires 
                si ce token n'est pas présent Laravel ne traitera pas le formulaire permet d'éviter les attaques csrf ou 
                attaque par formulaire 
                --}}
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
