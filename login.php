<?php include('connect.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom CSS for Login -->
    <style>
        /* Reset default margin and padding */
        body, html {
          display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Set background color and font family */
        body {
            background-color: #f8f9fa; /* Light gray background */
            font-family: Arial, sans-serif;
        }

        /* Center login section vertically and horizontally */
        .login-section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        /* Style login container */
        .login-container {
            background-color: #fff; /* White background for login form */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Soft shadow effect */
            width: 300px; /* Adjust width as needed */
        }

        /* Style login title */
        .login-title {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Style login form */
        .login-form .form-group {
            margin-bottom: 15px;
        }

        .login-form input[type="email"],
        .login-form input[type="password"],
        .login-form button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Style register link */
        .register-link {
            text-align: center;
            margin-top: 15px;
        }

        .register-link a {
            color: #007bff; /* Blue color for link */
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline; /* Underline link on hover */
        }
    </style>
</head>
<body>

<section class="login-section">
    <div class="container">
        <div class="login-container">
            <h2 class="login-title">Login</h2>
            <img src="https://img.freepik.com/free-vector/father-mother-son-3d-glasses-sitting-chairs-holding-popcorn-buckets-soda-watching-funny-movie-cinema-theatre-vector-illustration-family-leisure-time-entertainment-concept_74855-13067.jpg" alt="Your Image" class="img-fluid mb-4">
            <form action="login.php" method="post" class="login-form">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" required>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember_me"> Remember Me
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </div>
            </form>
            <div class="register-link">
                Don't have an account? <a href="register.php">Register here</a>
            </div>
        </div>
    </div>
</section>

<?php

if(isset($_POST['login'])){

  $email    = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM `users` WHERE email = '$email' and password = '$password' ";

  $rs = mysqli_query($con, $sql);
  
  if(mysqli_num_rows($rs) > 0){
     $data = mysqli_fetch_array($rs);

     $role = $data['roteype'];

     $_SESSION['uid'] = $data['userid'];
     $_SESSION['type'] = $role;

     // Check if Remember Me is checked
     if(isset($_POST['remember_me'])) {
        // Set cookie for email with 30 days expiration
        setcookie("email", $email, time() + (86400 * 30), "/");
        // Set cookie for password with 30 days expiration
        setcookie("password", $password, time() + (86400 * 30), "/");
     }

     if($role == 1){
      echo "<script> alert('admin login successfully!!') </script>";
      echo "<script> window.location.href='admin/dashboard.php';  </script>";
     }
     else if($role == 2){
      echo "<script> alert('user login successfully!!') </script>";
      echo "<script> window.location.href='index.php';  </script>";
     }

  }else{
    echo "<script> alert('Invalid email & password') </script>";
  }

}

?>
</body>
</html>
