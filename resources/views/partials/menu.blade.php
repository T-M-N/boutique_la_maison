<nav class="navbar  flex-column  align-items-start navbar-light bg-light">
<h1>Boutique La maison</h1>
<ul class="tophatbar navbar flex-row navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only"> (current) </span></a>
    </li>
    
    <li class="nav-item active">
        <a class="nav-link" href="{{route('show_product_solde')}}"> Solde<span class="sr-only"> (current)   </span></a>
    </li>

    @foreach($categories as $id => $name)
      <li class="{{ request()->id == $id ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{{route('show_product_category', $id)}}"> {{ $name }} </a>
     @endforeach
    </li>
</ul>
</nav>