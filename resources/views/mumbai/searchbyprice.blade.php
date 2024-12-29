@extends('layouts.layout')

@section('content')
<!-- Search Bar -->
<nav id="search-navbar" class="navbar navbar-expand-lg border-top">
    <div class="container-fluid">
        <form class="d-flex w-100 justify-content-center" role="search" method="POST" action="/searchmumbaihotels">
            @csrf
            <div class="input-group w-100">
                <input type="search" name="hotel_name" class="form-control custom-input" 
                       placeholder="Search hotel by name..." aria-label="Search">
                <button class="btn btn-custom" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="input-group w-20">
        <form action="/pricefilter" method="GET">
            <div class="sortby-container" style="width: 250px; display: flex; margin-left: 27%;">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Sort By</option>
                    <option value="0">Low to High</option>
                    <option value="1">High to Low</option>
                </select>
                <button class="btn btn-custom" type="submit">Search</button>
            </div>
        </form>
    </div>
</nav>
<br>

<!-- Left Sidebar -->
<div class="left-sidebar">
    <h4>Search Hotels</h4>
    <form method="POST" action="/searchbyprice">
        @csrf
        <!-- Min Price Input -->
        <div class="mb-3">
            <label for="minPriceInput" class="form-label">Min Price</label>
            <input type="number" id="minPriceInput" name="min_price" class="form-control" 
                   placeholder="Enter min price" min="0" />
        </div>

        <!-- Max Price Input -->
        <div class="mb-3">
            <label for="maxPriceInput" class="form-label">Max Price</label>
            <input type="number" id="maxPriceInput" name="max_price" class="form-control" 
                   placeholder="Enter max price" max="10000" />
        </div>

        <!-- Search Button -->
        <div class="input-group">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
    </form>
</div>

<link rel="stylesheet" href="css/hotellocation.css">

@foreach ($searchablePost as $hotel)
<div class="container my-4 hotel-card">
    <div class="row align-items-center">
        <!-- Left Side: Image -->
        <div class="col-md-3">
            <img src="{{ $hotel['hotel_image'] }}" alt="Hotel Image" class="img-fluid hotel-image">
        </div>

        <!-- Right Side: Hotel Info -->
        <div class="col-md-9 d-flex align-items-center justify-content-between">
            <div class="hotel-info">
                <h6 class="hotel-name">{{ $hotel['hote_name'] }}</h6>
                <p class="hotel-location"><span style="color:grey;">Location: </span>{{ $hotel['hotel_location'] }}</p>
            </div>
            <div class="price-section">
                <h3 style="background: yellow; width: 116px; padding: 7px; font-size: 19px; 
                           margin-left: 151px; margin-top: -22px;">
                    1 Day Price
                </h3>
                <h5 class="hotel-price">
                    <span style="color:grey;">Price ₹</span>{{ $hotel['hotel_price'] }}
                </h5>
                <div class="availability-section">
                    <a href="#" class="btn btn-primary check-availability">Check Availability</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
