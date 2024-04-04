<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- CSS Styling -->
    <style>
        .member {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        .member-img {
            text-align: center;
        }
        .member-info {
            text-align: center;
        }
        .member-info h4 {
            margin-top: 10px;
        }
        .member-info p {
            margin-bottom: 10px;
        }
        .member-info span {
            display: block;
            margin-top: 10px;
        }
        .member-info h6 {
            font-size: 18px;
            color: #6c757d;
        }
        .member-info span {
            display: block;
            margin-top: 10px;
            font-size: 16px;
            color: #6c757d;
        }
        .member-info h4, .member-info h6, .member-info span {
            margin-bottom: 5px;
        }
        .member-info h4 span {
            font-weight: normal;
            color: #343a40;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php include('connect.php')  ?>
<?php include('header.php')  ?>

<section id="team" class="team section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
        <h2>Booking Now</h2>
            <h3>Our <span>Theater</span></h3>
        </div>

        <div class="row mt-5">
            <?php
            $sql = "select theater.*, movies.*, categories.catname
                    from theater
                    inner join movies on movies.movieid = theater.movieid
                    inner join categories on categories.catid = movies.catid
                    order by theater.theaterid DESC";
            $res  = mysqli_query($con, $sql);
            if(mysqli_num_rows($res) > 0){
                while($data = mysqli_fetch_array($res)){
            ?>
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <div class="member-img">
                        <img src="admin/uploads/<?= $data['image'] ?>" style="height:250px !important; width:250px !important;" alt="">
                        <div class="social">
                            <a href="admin/uploads/<?= $data['trailer'] ?>" target="_blank" class="btn btn-primary" style="width:150px;">Watch Trailer</a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4><?= $data['theater_name'] ?></h4>
                        <h6><?= $data['title'] ?> <span><?= $data['catname'] ?></span></h6>
                        <span><?= $data['days'] ?></span>
                        <span><?= $data['date'] ?></span>
                        <span><?= $data['location'] ?></span>
                        <h4>Ticket: Rp.<?= $data['price'] ?></h4>
                        <a href="booking.php?id=<?=$data['theaterid']?>" target="_blank" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>

    </div>
</section>

<?php include('footer.php')  ?>

</body>
</html>
