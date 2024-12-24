<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMyStay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/homepage.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>

    <!-- Main Navbar -->
    <nav id="navbar">
        <div class="headercontainer">
            <h1 class="logo"><a href="#" class="logo">BookMyStay</a></h1>
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <?php $user = Session::get('user'); ?>
                <?php if (isset($user)) { ?>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Profile</a>
                        <li><a style="color:black;" href="{{ route('logout') }}">Logout</a></li>
                    </div>
                </div>
                <?php } else { ?>
                <li><a href="#" id="login-btn">Login</a></li>
                <li><a href="#" id="register-btn">Register</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav><br>

    <!-- Search Navbar -->
    <nav id="search-navbar" class="navbar navbar-expand-lg border-top">
        <div class="container-fluid">
            <form class="d-flex w-100 justify-content-center" role="search" method="GET" action="/search">
                <div class="input-group w-50">
                    <input type="search" class="form-control custom-input" placeholder="Search for hotels..." aria-label="Search" name="query">
                    <button class="btn btn-custom" type="submit">Search</button>
                </div>
            </form>
        </div>
    </nav><br>

    <!-- Left Sidebar with Search & Price Filter -->
    <div class="left-sidebar">
    <h4>Search Hotels</h4>
    <form method="GET" action="/search">
        <!-- Min Price Input -->
        <div class="mb-3">
            <label for="minPriceInput" class="form-label">Min Price</label>
            <input type="number" id="minPriceInput" name="min_price" class="form-control" placeholder="Enter min price" min="0" />
        </div>
        
        <!-- Max Price Input -->
        <div class="mb-3">
            <label for="maxPriceInput" class="form-label">Max Price</label>
            <input type="number" id="maxPriceInput" name="max_price" class="form-control" placeholder="Enter max price" max="10000" />
        </div>
        
        <!-- Search Button -->
        <div class="input-group">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
    </form>
</div>



    <!-- Yield Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer bg-dark">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <h1 class="logo"><a href="#">BMS</a></h1>
                </div>
                <div class="footer-links">
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-social">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 <strong>BMS</strong>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Display the search navbar with animation
            const searchNavbar = document.getElementById("search-navbar");
            setTimeout(() => {
                searchNavbar.classList.add("visible");
            }, 300); // Delay the animation slightly for effect
        });

        // JavaScript to update the price range display dynamically
        document.getElementById('priceRange').addEventListener('input', function () {
            let priceValue = document.getElementById('priceValue');
            priceValue.textContent = `$${this.value} - $1000`;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
