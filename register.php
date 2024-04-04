<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    <style>
        /* Styling for the register form */
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa; /* Light gray background */
        }

        /* Style register container */
        .register-container {
            background-color: #fff; /* White background for register form */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Soft shadow effect */
            width: 300px; /* Adjust width as needed */
        }

        /* Style register title */
        .register-title {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Style register form */
        .register-form .form-group {
            margin-bottom: 15px;
        }

        .register-form input[type="text"],
        .register-form input[type="email"],
        .register-form input[type="password"],
        .register-form button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Style register button */
        .register-button {
            text-align: center;
            margin-top: 15px;
        }

        .register-button button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff; /* Blue color for button */
            color: #fff; /* White text color */
            cursor: pointer;
        }

        .register-button button:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }
    </style>
</head>
<body>

<section>
    <div class="register-container">
        <h2 class="register-title">Register for Booking Ticket</h2>
       
        <img src="https://img.freepik.com/free-vector/father-mother-son-3d-glasses-sitting-chairs-holding-popcorn-buckets-soda-watching-funny-movie-cinema-theatre-vector-illustration-family-leisure-time-entertainment-concept_74855-13067.jpg" alt="Your Image" class="img-fluid mb-4">
        <form action="register.php" method="post" class="register-form">
            <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" required>
            </div>
            <div class="register-button">
                <button type="submit" name="register">Register</button>
            </div>
        </form>
    </div>
</section>

</body>
</html>
