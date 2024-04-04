<?php 
include('connect.php');

function saveUserProfile($name, $email, $password){
    global $con;
    $sql = "INSERT INTO `users`(`name`, `email`, `password`, `roteype`) VALUES ('$name','$email','$password','2')";
    if(mysqli_query($con, $sql)){
        return true; // Mengembalikan true jika penyimpanan berhasil
    }else{
        return false; // Mengembalikan false jika penyimpanan gagal
    }
}

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
    <title>User Profile</title>
    <style>
        .profile-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 40px; 
        }
        .profile-card h3 {
            margin-top: 0;
            font-size: 24px;
        }
        .profile-card p {
            margin-bottom: 5px;
        }
        .review-form {
            margin-top: 20px;
        }
        .review-form textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
            padding: 5px;
        }
        .review-form input[type="submit"] {
            padding: 8px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php include('header.php')  ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <?php
            $uid = $_SESSION['uid'];
            $sql = "SELECT * FROM `users` WHERE userid = '$uid'";
            $res = mysqli_query($con, $sql);
            
            // Menggunakan while loop untuk menampilkan informasi profil pengguna
            while($data = mysqli_fetch_array($res)){
            ?>
                <div class="profile-card">
                    <h3>User Profile</h3>
                    <p><strong>Name:</strong> <?= $data['name'] ?></p>
                    <p><strong>Email:</strong> <?= $data['email'] ?></p>
                </div>
            <?php
            }
            
            // Memeriksa apakah data pengguna ditemukan atau tidak
            if(mysqli_num_rows($res) == 0){
                echo 'No user found';
            }
            ?>
        </div>
        <div class="col-lg-6">
            <div class="review-form">
                <h3>Add Review</h3>
                <form id="reviewForm">
                    <textarea id="reviewContent" placeholder="Write your review here..."></textarea>
                    <input type="submit" value="Submit Review">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php')  ?>

<script>
    // Mengambil form review
    const reviewForm = document.getElementById('reviewForm');
    // Mendengarkan event submit form
    reviewForm.addEventListener('submit', function(e) {
        // Mencegah pengiriman form secara default
        e.preventDefault();
        // Mengambil konten review dari textarea
        const reviewContent = document.getElementById('reviewContent').value;
        // Simpan review ke Local Storage dengan key 'userReview'
        localStorage.setItem('userReview', reviewContent);
        // Memberi notifikasi bahwa review telah disimpan
        alert('Review saved successfully!');
        document.getElementById('reviewContent').value = '';
    });
</script>

</body>
</html>
