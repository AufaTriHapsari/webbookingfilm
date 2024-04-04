<!-- Favicons -->
<link href="../assets/img/favicon.png" rel="icon">
<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="../assets/vendor/aos/aos.css" rel="stylesheet">
<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="../assets/css/style.css" rel="stylesheet">

<!-- Custom CSS for Active Navigation Links -->
<style>
  #navbar ul .active {
    color: blue;
  }
</style>

<header id="header" class="d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">
    <h1 class="logo"><a href="dashboard.php">ICINEMAX<span>.</span></a></h1>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto <?php if(basename($_SERVER['PHP_SELF']) == 'dashboard.php') echo 'active'; ?>" href="dashboard.php">Dashboard</a></li>
        <li><a class="nav-link scrollto <?php if(basename($_SERVER['PHP_SELF']) == 'categories.php') echo 'active'; ?>" href="categories.php">Categories</a></li>
        <li><a class="nav-link scrollto <?php if(basename($_SERVER['PHP_SELF']) == 'movies.php') echo 'active'; ?>" href="movies.php">Movies</a></li>
        <li><a class="nav-link scrollto <?php if(basename($_SERVER['PHP_SELF']) == 'theater.php') echo 'active'; ?>" href="theater.php">Theater</a></li>
        <li><a class="nav-link scrollto <?php if(basename($_SERVER['PHP_SELF']) == 'viewallusers.php') echo 'active'; ?>" href="viewallusers.php">Users</a></li>
        <li><a class="nav-link scrollto <?php if(basename($_SERVER['PHP_SELF']) == 'viewallbooking.php') echo 'active'; ?>" href="viewallbooking.php">Booking</a></li>
        <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
  </div>
</header>
