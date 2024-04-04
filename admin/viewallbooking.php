<?php 
include('../connect.php');

if(!isset($_SESSION['uid'])){
  echo "<script> window.location.href='../login.php';  </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
</head>
<body>


<?php include('header.php')  ?>



<div class="container">
   
<div class="row mt-5">


  <div class="col-lg-12">
  
     <table class="table">
      <tr>
        <th>ID</th>
        <th>Theater Name</th>
        <th>Movie</th>
        <th>Date</th>
        <th>Days</th>
        <th>Seat</th>
        <th>Location</th>
        <th>User</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      
      <?php

      if(isset($_POST['btnsearch'])){

        $start  = $_POST['start'];
        $end    = $_POST['end'];
        $status = $_POST['status'];

        $total_sale = 0;

        $sql = "SELECT booking.bookingid, booking.bookingdate, booking.person, theater.theater_name, theater.timing, theater.days, theater.price, theater.location, movies.title,  categories.catname, users.name AS 'username',
        booking.status
        FROM booking
        INNER JOIN theater ON theater.theaterid = booking.theaterid
        INNER JOIN users ON users.userid = booking.userid
        INNER JOIN movies ON movies.movieid = theater.movieid
        INNER JOIN categories ON categories.catid = movies.catid
        WHERE booking.bookingdate BETWEEN '$start' AND '$end' AND booking.status = '$status'";
        $res  = mysqli_query($con, $sql);
        if(mysqli_num_rows($res) > 0){
          while($data = mysqli_fetch_array($res)){

            $total_sale = $total_sale + $data['price'];
  
            ?>

          <tr>
        
            <td><?= $data['theater_name'] ?></td>
            <td><?= $data['title'] ?> - <?= $data['catname'] ?></td>
            <td><?= $data['bookingdate'] ?></td>
            <td><?= $data['days'] ?>       
            <td><?= $data['person'] ?></td> 
            <td><?= $data['location'] ?></td>
            <td><?= $data['username'] ?></td>
            <td>
              <?php
              if($data['status'] == 0){
                echo "<a href='#' class='btn btn-warning' > Pending </a>";
              }else{
                echo "<a href='#' class='btn btn-success' > Approved </a>";
              }
              ?>
            </td>
            <td>
              <?php
              if($data['status'] == 1){
                echo "<button type='button' class='btn btn-light' disabled> Completed </button>";
              }else{
                echo "<a href='viewallbooking.php?bookingid=".$data['bookingid']."' class='btn btn-primary'> Approve</a>";
              }
              ?>
            </td>
          </tr>

            <?php
          }
            echo "<tr> <td>Total Sale: <strong> RP.".$total_sale." </strong></td> </tr>";
        }

      }else{


      $sql = "SELECT booking.bookingid, booking.bookingdate, booking.person, theater.theater_name, theater.timing, theater.days, theater.price, theater.location, movies.title,  categories.catname, users.name AS 'username',
      booking.status
      FROM booking
      INNER JOIN theater ON theater.theaterid = booking.theaterid
      INNER JOIN users ON users.userid = booking.userid
      INNER JOIN movies ON movies.movieid = theater.movieid
      INNER JOIN categories ON categories.catid = movies.catid 
      ";
      $res  = mysqli_query($con, $sql);
      if(mysqli_num_rows($res) > 0){
        while($data = mysqli_fetch_array($res)){

          ?>

        
          <tr>
            <td><?= $data['bookingid'] ?></td>
            <td><?= $data['theater_name'] ?></td>
            <td><?= $data['title'] ?> - <?= $data['catname'] ?></td>
            <td><?= $data['bookingdate'] ?></td>
            <td><?= $data['days'] ?>     
            <td><?= $data['person'] ?></td>
            <td><?= $data['location'] ?></td>
            <td><?= $data['username'] ?></td>
            <td>
              <?php
              if($data['status'] == 0){
                echo "<a href='#' class='btn btn-warning' > Pending </a>";
              }else{
                echo "<a href='#' class='btn btn-success' > Approved </a>";
              }
              ?>
            </td>
            <td>
              <?php
              if($data['status'] == 1){
                echo "<button type='button' class='btn btn-light' disabled> Completed </button>";
              }else{
                echo "<a href='viewallbooking.php?bookingid=".$data['bookingid']."' class='btn btn-primary'> Approve</a>";
              }
              ?>
            </td>
          </tr>


       <?php
        }
      }else{
        echo 'no booking found';
      }

    }
   

      ?>


     </table>

  </div>
</div>
  

</div>


<?php include('footer.php')  ?>

</body>
</html>

<?php

if(isset($_GET['bookingid'])){

  $bookingid  = $_GET['bookingid'];
  $sql = "UPDATE `booking` SET `status`= 1 WHERE bookingid = '$bookingid'";

  if(mysqli_query($con,$sql)){
    echo "<script> alert('booking approved successfully!!') </script>";
    echo "<script> window.location.href='viewallbooking.php';  </script>";
  }else{
    echo "<script> alert('not approved successfully!!') </script>";
  }
}
?>
