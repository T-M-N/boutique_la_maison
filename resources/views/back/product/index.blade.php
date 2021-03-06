@extends('layouts.master')

@section('content')

<br/>
{{$products->links()}}
<br/>
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
            <td><a href="{{route('show_product', $product->id)}}">{{$product->title}}</a></td>

            <td>
                {{$product->genre}}
            </td>
                <td>
                {{$product->price}} &euro;
            </td>
                <td>
                @if($product->status == 'published')
                <p>Publié</p>
                @else
                <p>Non publié</p>
                @endif
            </td>
            <td>
                <a class="btn btn-secondary" href="{{route('admin.edit', $product->id)}}">Mettre à jour</a></td>
            </td>
                <td>
                <form class="delete" method="HEAD" action="{{route('admin.destroy', $product->id)}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_methode" value="DELETE"/>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
            
        </tr>
        @empty
        @endforelse
        </tbody>
    </table>
{{$products->links()}}
@endsection
