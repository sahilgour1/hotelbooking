
<link rel="stylesheet" href="{{ URL::asset('css/hotelpost.css') }} ">

<div class="container">
    <h1 class="text-center">Create Hotel </h1>
        <a href="{{ route('/ui') }}">ui</a>
    <div class="animated-form" style="animation: fadeInUp 1s;">
        <form action="{{ route('/createhotel') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF Token for security -->

            <!-- Hidden Field for cus_id -->
            <input type="hidden" name="cus_id" value="1">

            <!-- Hotel Name -->
            <div class="form-group">
                <label for="hotel_name">Hotel Name</label>
                <input type="text" class="form-control" id="hotel_name" name="hotel_name" placeholder="Enter hotel name" required>
            </div>

            <!-- Hotel Price -->
            <div class="form-group">
                <label for="hotel_price">Hotel Price</label>
                <input type="number" class="form-control" id="hotel_price" name="hotel_price" placeholder="Enter hotel price" required>
            </div>

            <!-- Hotel Image -->
            <div class="form-group">
                <label for="hotel_image">Hotel Image</label>
                <input type="file" class="form-control" id="hotel_image" name="hotel_image" required>
            </div>

            <!-- Hotel Location -->
            <div class="form-group">
                <label for="hotel_location">Hotel Location</label>
                <input type="text" class="form-control" id="hotel_location" name="hotel_location" placeholder="Enter hotel location" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>



