<?php 
include('connect.php');

if(!isset($_SESSION['uid'])){
  echo "<script> window.location.href='login.php';  </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Booking</title>
</head>
<body>

<?php include('header.php')  ?>

<div class="container">
    <div class="section-title">
        <h3>History <span>Transaction</span></h3>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Time</th> 
                    <th>Days</th>
                    <th>Ticket</th>
                    <th>Location</th>
                    <th>User</th>
                    <th>Seat</th> <!-- Tambah kolom Person -->
                    <th>Status</th>
                </tr>
                
                <?php
                $uid = $_SESSION['uid'];

                $sql = "select booking.bookingid, booking.bookingdate, booking.person, booking.jam, theater.theater_name, theater.timing, theater.days, theater.price, theater.location, movies.title,  categories.catname, users.name as 'username', booking.status
                        from booking
                        inner join theater on theater.theaterid = booking.theaterid
                        inner join users on users.userid = booking.userid
                        inner join movies on movies.movieid = theater.movieid
                        inner join categories on categories.catid = movies.catid 
                        where booking.userid = '$uid'";
                
                $res  = mysqli_query($con, $sql);
                $num_rows = mysqli_num_rows($res); // Get the number of rows

                if($num_rows > 0){
                    for($i = 0; $i < $num_rows; $i++) { // Use for loop instead of while loop
                        $data = mysqli_fetch_array($res); // Fetch data for each iteration
                ?>

                <tr>
                    <td><?= $data['theater_name'] ?></td>
                    <td><?= $data['title'] ?> - <?= $data['catname'] ?></td>
                    <td><?= $data['days'] ?></td>
                    <td><?= $data['jam'] ?></td> <!-- Menampilkan jam -->
                    <td><?= $data['price'] ?></td>
                    <td><?= $data['bookingdate'] ?></td>
                    <td><?= $data['location'] ?></td>
                    <td><?= $data['username'] ?></td>
                    <td><?= $data['person'] ?></td> <!-- Menampilkan Person -->
                    <td>

                    <?php
                    if($data['status'] == 0){
                        echo "<a href='#' class='btn btn-warning' > Pending </a>";
                    }else{
                        echo "<a href='#' class='btn btn-success' > Approved </a>";
                    }
                    ?>

                    </td>
                </tr>

                <?php
                    }
                }else{
                    echo 'no booking found';
                }
                ?>
            </table>
        </div>
    </div>
</div>

<?php include('footer.php')  ?>

</body>
</html>
