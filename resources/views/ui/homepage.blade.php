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
<header class="bg-dark">
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
              <li ><a style="color:black;" href="{{ route('logout') }}">Logout</a></li>
            </div>
          </div>
        <?php } else { ?>
          <li><a href="#" id="login-btn">Login</a></li>
          <li><a href="#" id="register-btn">Register</a></li>
        <?php } ?>
      </ul>
    </div>
  </nav>
  <div id="hero">
    <div class="container" style="
        padding: 25%;
    ">
      <div class="hero-content">
        <h1 class="main-heading">Find Your Perfect Stay</h1>
        <p class="lead">Explore the best hotels, resorts, and destinations for your next vacation.</p>
      </div>
    </div>
  </div>
</header>

<!-- Hotel List Section -->
<section id="hotel-list" class="bg-light">
  <div class="container">
    <h2 class="section-title">Available Locations</h2>
    <div class="hotel-cards">
      <div class="hotel-card">
        <div class="image-container">
          <a href="/mumbai-hotels">
            <img src="../img/mumbai.jpg" alt="Mumbai">
            <div class="overlay">
              <h3>Mumbai</h3>
              <h4>India</h4>
            </div>
          </a>
        </div>
      </div>
      <div class="hotel-card">
        <div class="image-container">
          <a href="/jaipur-hotels">
            <img src="../img/jaipur.jpg" alt="Jaipur">
            <div class="overlay">
              <h3>Jaipur</h3>
              <h4>India</h4>
            </div>
          </a>
        </div>
      </div>
      <div class="hotel-card">
        <div class="image-container">
          <a href="/delhi-hotels">
            <img src="../img/delhi.jpg" alt="Delhi">
            <div class="overlay">
              <h3>Delhi</h3>
              <h4>India</h4>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>




<!-- Register Popup -->
<div id="register-popup" class="popup hidden">
  <div class="popup-content">
    <span class="close-btn">&times;</span>
    <h2>Register</h2>
    <form action="/registeruser" method="POST">
      @csrf
      <input type="text" name="username" placeholder="Full Name" required>
      @error('username') <span class="error-message">{{ $message }}</span> @enderror
      <input type="email" name="email" placeholder="Email" required>
      @error('email') <span class="error-message">{{ $message }}</span> @enderror
      <input type="password" name="password" placeholder="Password" required>
      @error('password') <span class="error-message">{{ $message }}</span> @enderror
      <input type="tel" name="number" placeholder="Phone Number" required>
      @error('number') <span class="error-message">{{ $message }}</span> @enderror
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
</div>

<!-- Login Popup -->
<div id="login-popup" class="popup hidden">
  <div class="popup-content">
    <span class="close-btn">&times;</span>
    <h2>Login</h2>
    <form action="/loginuser" method="POST">
      @csrf
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</div>

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

<!-- JavaScript -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const loginBtn = document.getElementById("login-btn");
    const registerBtn = document.getElementById("register-btn");
    const loginPopup = document.getElementById("login-popup");
    const registerPopup = document.getElementById("register-popup");
    const closeButtons = document.querySelectorAll(".close-btn");

    if (loginBtn) {
      loginBtn.addEventListener("click", () => {
        loginPopup.classList.remove("hidden");
      });
    }

    if (registerBtn) {
      registerBtn.addEventListener("click", () => {
        registerPopup.classList.remove("hidden");
      });
    }

    closeButtons.forEach((button) =>
      button.addEventListener("click", () => {
        loginPopup.classList.add("hidden");
        registerPopup.classList.add("hidden");
      })
    );

    window.addEventListener("click", (e) => {
      if (e.target === loginPopup) loginPopup.classList.add("hidden");
      if (e.target === registerPopup) registerPopup.classList.add("hidden");
    });
  });
</script>
</body>
</html>
