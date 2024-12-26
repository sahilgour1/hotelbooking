@extends('layouts.layout')

@section('content')
<link rel="stylesheet" href="css/hotellocation.css">
<?php  foreach($mumbai_hotels as $mumbai_hotels){?>

<div class="container my-4 hotel-card">
    <div class="row align-items-center">
        <!-- Left Side: Image -->
        <div class="col-md-3">
            <img src="<?php  echo $mumbai_hotels['hotel_image'] ?>" alt="Hotel Image" class="img-fluid hotel-image">
        </div>

        <!-- Right Side: Hotel Info -->
        <div class="col-md-9 d-flex align-items-center justify-content-between">
            <div class="hotel-info">
                <?php?>
                <h6 class="hotel-name"><?php echo $mumbai_hotels['hote_name'] ?></h6>
                <p class="hotel-location"><span style="color:grey;">Location </span><?php echo  $mumbai_hotels['hotel_location'] ?></p>
            </div>
       
            <div class="price-section">
            <h3 style="
                background: yellow;
                width: 116px;
                padding: 7px;
                font-size: 19px;
                margin-left: 151px;
                margin-top: -22px;
            "> 1 Day Price</h3>

                <h5 class="hotel-price"> <span style="color:grey;">Price ₹</span><?php echo $mumbai_hotels['hotel_price'] ?></h5>
                <div class="availability-section">
                <a href="#" class="btn btn-primary check-availability">Check Availability</a>
            </div>
            </div>
        </div>
    </div>
</div>
<?php }?>


@endsection
