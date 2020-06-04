<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        @include('partials.menu')
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
        @yield('content')
    </div>
    </div>
</div>
@section('scripts')
<script src="{{asset('js/app.js')}}"></script>
@show

<style>

/* Galery product home */
.galery-product ul{
   margin:2.2em auto; 
   width: 960px;
}

.galery-product li{
        max-width: 30%;
}

h2{
    font-size: 1rem;
}

img.homme{
    max-width: 84%;
    margin:auto;
}

.list-inline-item:not(:last-child) {
    margin-right: 1.5rem;
    margin-top: 1rem;
}
/* Navigation */
nav h1{
    font-size: 1.5rem;
}
.tophatbar li{
    margin-right:1em;
    text-transform: capitalize;
}

/* Pagination */
.pagination{
   justify-content: center;
}
</style>

</body>
</html>