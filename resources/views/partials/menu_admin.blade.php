<!-- <nav class="navbar  flex-column  align-items-start navbar-light bg-light">
<h1>Boutique La maison</h1>
<ul class="tophatbar-admin navbar flex-row navbar-nav mr-auto">

    <li class="{{ (request()->is('/')) ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{{route('home')}}">Retour à l'accueil<span class="sr-only"> (current) </span></a>
    </li>
    
    <li class="{{ (request()->is('admin')) ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{{route('admin.store')}}"> Dashboard<span class="sr-only"> (current)   </span></a>
    </li>

     <li class="{{ (request()->is('admin/ajouter-produit')) ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{{route('product.create')}}"> Ajouter un produit<span class="sr-only"> (current)   </span></a>
    </li>
    </li>

</ul>
</nav> -->