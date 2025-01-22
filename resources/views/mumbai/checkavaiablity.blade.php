@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/checkavaiablity.css') }}">

<div class="container mt-5">
    <!-- Overview Section -->
    <div class="overview-section">
        <div class="overview-image">
            <img src="{{ $hotel['hotel_image'] }}" alt="Overview Image" class="hotel-overview-image">
        </div>
        <div class="overview-content">
            <h1 class="overview-title">Over View </h1><br>
            <p class="overview-description">
                Welcome to {{ $hotel['hote_name'] }} 
            </p>
            <p class="overview-description">
                {{ $hotel['overview'] }} 
            </p>
            <ul class="overview-features">
                <li>✓ Spacious and elegant rooms</li>
                <li>✓ Complimentary Wi-Fi</li>
                <li>✓ 24/7 room service</li>
                <li>✓ Easy access to popular attractions</li>
            </ul>
        </div>
    </div>

    <!-- Hotel Availability Section -->
    <div class="table-container mt-5">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Hotel Image</th>
                    <th>Hotel Name</th>
                    <th>Price (per night)</th>
                    <th>Avaiablity</th>
                    <th>Selectd  Room</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img src="{{ $hotel['hotel_image'] }}" alt="{{ $hotel['hotel_image'] }} Image" class="hotel-image">
                    </td>
                    <td>{{ $hotel['hote_name'] }}</td>
                    <td>₹{{ $hotel['hotel_price'] }}</td>
                    <td>
                        <button class="custom-btn" data-hotel-id="{{ $hotel['id'] }}">
                            Select
                        </button>
                    </td>
                    <td > <b style='color:red'>Room Not  Selected </b></td>

                </tr>
            </tbody>
        </table>
    </div>
</div><br><br><br><br><br><br><br><br><br>

<script>
$(document).ready(function () {
    console.log("Hotel availability page ready!");

   
   
});
</script>

@endsection
