<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/register.css') }} ">
    <title>Login Form</title>
</head>
<body>
    <form method="POST" action="/login">
        <div class="container">
          <h1>Admin Panel</h1>
          <p>Please fill in this form to create an account.</p>
            @csrf
              <label for="email"><b>Username</b></label>
            <input type="text" name="username" placeholder="Enter Username" required>
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" required>
          
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
      
            
          <div class="clearfix">
      
            <button type="submit" class="btn">Login </button>
          </div>
        </div>
      </form>

  <div class="youtubeBtn">
  <a target="_blank" href="https://www.youtube.com/watch?v=7k8kKRQa9jY">
      <span>Watch on YouTube</span>
  <i class="fab fa-youtube"></i>
    </a>

</div>
</body>
</html>