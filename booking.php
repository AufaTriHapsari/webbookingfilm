<?php 
// Sertakan file koneksi
include('connect.php');

// Cek apakah pengguna telah login
if(!isset($_SESSION['uid'])){
  echo "<script> window.location.href='login.php';  </script>";
  exit; // Hentikan eksekusi script jika belum login
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Booking</title>
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
        /* CSS untuk memposisikan box dalam orientasi landscape */
        .booking-box {
            width: 70%; /* Mengatur lebar box */
            height: 400px; /* Mengatur tinggi box */
            margin: 50px auto; /* Mengatur margin secara otomatis untuk memposisikan box di tengah */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex; /* Menggunakan flex untuk mengatur posisi gambar dan konten */
        }
        
        .booking-title {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Gaya untuk gambar */
        .booking-img {
            flex: 1; /* Memberikan gambar fleksibilitas untuk menyesuaikan ukuran */
            display: flex; /* Mengatur posisi gambar ke tengah */
            justify-content: center; /* Mengatur posisi gambar secara horizontal ke tengah */
            align-items: center; /* Mengatur posisi gambar secara vertikal ke tengah */
            padding-right: 20px; /* Memberikan sedikit ruang di sebelah kanan gambar */
        }

        .booking-img img {
            max-width: 100%; /* Memastikan gambar tidak melebihi ukuran parent */
            height: auto; /* Menjaga aspek rasio gambar */
            border-radius: 8px; /* Memberikan border radius agar gambar terlihat lebih baik */
        }

        /* Gaya untuk konten */
        .booking-content {
            flex: 2; /* Memberikan fleksibilitas untuk konten agar dapat mengambil lebih banyak ruang */
            padding: 20px; /* Memberikan ruang di sekeliling konten */}
    </style>
</head>
<body>
    
    <div class="booking-box">
        <div class="booking-img">
            <img src="https://img.freepik.com/premium-vector/armchairs-cinema-red-comfortable-chairs-drinks-popcorn-convenient-movie-viewing-vector-illustration_273828-499.jpg" alt="Image">
        </div>
        <div class="booking-content">
            <h2 class="booking-title">Ticket Booking</h2>
            <form action="booking.php" method="post">
                <input type="hidden" name="theaterid" value="<?php echo $_GET['id']; ?>">
                <div class="form-group">
                    <label for="person">Number of People:</label>
                    <input type="number" class="form-control" name="person" id="person" placeholder="Enter no of People" required min="1" max="10">
                </div>
                
                <div class="form-group">
                    <label for="date">Select the Date:</label>
                    <input type="date" class="form-control" name="date" id="date" min="<?=date('Y-m-d');?>" max="<?=date('Y-m-t');?>" required>
                </div>
                <div class="form-group">
                    <label for="time">Select the Time:</label>
                    <select class="form-control" name="time" id="time" required>
                        <option value="">Select Time</option>
                        <option value="11:00">09:00 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="15:00">03:00 PM</option>
                        <option value="18:00">06:00 PM</option>
                    </select>
                </div>
                <div class="text-center" style="margin-top: 20px;">
    <button type="submit" class="btn btn-primary" name="ticketbook">Book Ticket</button>
</div>

            </form>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['ticketbook'])){
    $person     = $_POST['person'];
    $date       = $_POST['date'];
    $jam      = $_POST['time']; // Ubah 'jam' menjadi 'time'
    $theaterid  = $_POST['theaterid'];
    $uid = $_SESSION['uid'];

    $sql = "INSERT INTO `booking`(`theaterid`, `bookingdate`, `jam`, `person`, `userid`) VALUES ('$theaterid','$date','$jam','$person','$uid')";

    if(mysqli_query($con, $sql)){
        echo "<script> alert('Ticket booked successfully!!') </script>";
        echo "<script> window.location.href='index.php';  </script>";
    }else{
        echo "<script> alert('Ticket not booked') </script>";
    }
}
?>
