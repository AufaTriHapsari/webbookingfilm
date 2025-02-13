<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- CSS Styling -->
    <style>
        /* Styling for the search form */
        .search-form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .search-form .form-group {
            margin-right: 10px;
        }
        .search-form .form-group select {
            width: 100%;
        }
        .search-form .form-group input[type="submit"] {
            width: 100%;
        }
        /* Styling for the movie cards */
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
    </style>
</head>
<body>

<?php include('connect.php')  ?>
<?php include('header.php')  ?>

<section id="team" class="team section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
            <h2>Now Showing</h2>
            <h3>Our <span>Movies</span></h3>
        </div>

        
        <form action="index.php" method="post" class="search-form">
            <div class="form-group">
                <select name="catid" class="form-control">
                    <option value="">Select Category</option>
                    <?php
                    $sql = "SELECT * FROM `categories`";
                    $res  = mysqli_query($con, $sql);
                    if(mysqli_num_rows($res) > 0){
                        while($data = mysqli_fetch_array($res)){
                            ?>
                            <option value="<?=$data['catid']?>"> <?=$data['catname']?> </option>
                            <?php
                        }
                    }else{
                        ?>
                        <option value="">No Category found</option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="btnSearch" value="Search" class="btn btn-primary">
            </div>
        </form>

        <div class="row mt-5">
            <!-- Movie Cards -->
            <?php
            if(isset($_POST['btnSearch'])){
                $catid = $_POST['catid'];
                $sql = "SELECT movies.*, categories.catname
                        from movies
                        inner join categories on categories.catid = movies.catid
                        where movies.catid = '$catid'";
                $res  = mysqli_query($con, $sql);
                if(mysqli_num_rows($res) > 0){
                    while($data = mysqli_fetch_array($res)){
                        ?>
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                            <div class="member">
                                <div class="member-img">
                                    <img src="admin/uploads/<?= $data['image'] ?>"  style="height:250px !important; width:250px !important;" alt="">
                                    <div class="social">
                                        <a href="admin/uploads/<?= $data['trailer'] ?>" target="_blank"  class="btn btn-primary" style="width:150px;">Watch Trailer</a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4><?= $data['title'] ?></h4>
                                    <p><?= $data['description'] ?></p> <!-- Added description here -->
                                    <span><?= $data['catname'] ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No movies found.</p>";
                }
            } else {
                $sql = "SELECT movies.*, categories.catname
                        from movies
                        inner join categories on categories.catid = movies.catid
                        order by movies.movieid DESC";
                $res  = mysqli_query($con, $sql);
                if(mysqli_num_rows($res) > 0){
                    while($data = mysqli_fetch_array($res)){
                        ?>
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                            <div class="member">
                                <div class="member-img">
                                    <img src="admin/uploads/<?= $data['image'] ?>"  style="height:250px !important; width:250px !important;" alt="">
                                    <div class="social">
                                        <a href="admin/uploads/<?= $data['trailer'] ?>" target="_blank"  class="btn btn-primary" style="width:150px;">Watch Trailer</a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4><?= $data['title'] ?></h4>
                                    <p><?= $data['description'] ?></p> <!-- Added description here -->
                                    <span><?= $data['catname'] ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No movies found.</p>";
                }
            }
            ?>
        </div>

    </div>
</section>

<?php include('footer.php')  ?>

</body>
</html>
