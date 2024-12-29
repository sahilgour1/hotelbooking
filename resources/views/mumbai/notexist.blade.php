@extends('layouts.layout')
<link rel="stylesheet" href="css/hotellocation.css">

@section('content')
<!-- Search Bar -->
<nav id="search-navbar" class="navbar navbar-expand-lg border-top">
    <div class="container-fluid" style="
        margin-left: -151px;   
    ">
        <form class="d-flex w-100 justify-content-center" role="search" method="POST" action="/searchmumbaihotels">
            @csrf
            <div class="input-group w-50">
                <input type="search" name="hotel_name" class="form-control custom-input" placeholder="Search hotel by name..." aria-label="Search">
                <button class="btn btn-custom" type="submit">Search</button>
            </div>
        </form>
    </div>
</nav>
<br>



<!-- "Hotel Not Found" Message -->
<div class="container my-4 not-found-container">
    <div class="not-found-title">
        Oops! No Hotels Found 🏨
    </div>
    <div class="not-found-emoji"></div>
    <p class="not-found-message">
        Sorry, we couldn't find any hotels matching your search.<br>
        Please try searching with a different name or browse our categories.
    </p>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

@endsection
