
<nav class="navbar  flex-column  align-items-start navbar-light bg-light">
<h1>Boutique La maison</h1>
@if(Route::is('admin.*') == false)
<ul class="tophatbar navbar flex-row navbar-nav mr-auto">

    <li class="{{ (request()->is('/')) ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only"> (current) </span></a>
    </li>
    
    <li class="{{ (request()->is('solde')) ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{{route('show_product_solde')}}"> Solde<span class="sr-only"> (current)   </span></a>
    </li>

    @foreach($categories as $id => $name)
      <li class="{{request()->id == $id ? 'active' : '' }} }} nav-item">
        <a class="nav-link" href="{{route('show_product_category', $id)}}"> {{ $name }} </a>    
      </li>
     @endforeach
</ul>

@else

<ul class="tophatbar-admin navbar flex-row navbar-nav mr-auto">

    <li class="{{ (request()->is('/')) ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{{route('home')}}">Retour à l'accueil<span class="sr-only"> (current) </span></a>
    </li>
    
    <li class="{{ (request()->is('admin')) ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{{route('admin.store')}}"> Dashboard<span class="sr-only"> (current)   </span></a>
    </li>

     <li class="{{ (request()->is('admin/create')) ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{{route('admin.create')}}"> Ajouter un produit<span class="sr-only"> (current)   </span></a>
    </li>
    </li>

</ul>
 @endif 
</nav>
