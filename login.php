<?php
// time out session

// ini_set('session.cookie_lifetime', 120);
// ini_set('session.gc_maxlifetime', 120);

// Start the session
session_start();
$conn = new mysqli("localhost", "root","root", "db_phone_shop");
?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>SRVC-cambodia</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href='' rel='stylesheet'>
    <script type='text/javascript' src=''></script>
    <link rel="stylesheet" href="./login.css">
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
</head>

<body class='snippet-body'>
    <!--  for block mouse right====> oncontextmenu='return false' -->
    <section class="body">
        <div class="container">
            <div class="login-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="">
                            <a class="navbar-brand" href="index.html" id="logo1">Welcome TO Admin Darsbord</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <br>
                        <h3 class="header-title">LOGIN</h3>
                        <form class="login-form" method="POST" action="?">
                            <div class="form-group">
                                <input name="username" type="text" class="form-control" placeholder="Email or UserName">
                            </div>
                            <div class="form-group">
                                <input name="pass" type="Password" class="form-control" placeholder="Password">
                                <a href="#!" class="forgot-password">Forgot Password?</a>
                            </div>
                            <div class="form-group">
                                <button name="submit" class="btn btn-primary btn-block">LOGIN</button>
                            </div>
                            <div class="form-group">
                                <div class="text-center">New Member? <a href="./reigesterform.php">Sign up Now</a></div>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['submit'])) {
                            $user = $_POST['username'];
                            $pass = $_POST['pass'];
                            $sql = "SELECT * FROM tbl_user WHERE u_name='" . $user . "' AND u_pass='" . $pass . "' limit 1";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            if ($row) {
                                if ($row['u_type'] == 'admin') {
                                    $_SESSION['id'] = $row['id'];
                                    $_SESSION['name'] = $row['u_name'];
                                    $_SESSION['image'] = $row['u_img'];
                                    $_SESSION['type'] = $row['u_type'];
                                    header("location:/srvc/admin-dashboard-main/addminindex.php");
                                } else {

                                   echo"can't login";
                                }
                            }
                        }
                        ?>


                    </div>
                    <div class="col-sm-6 hide-on-mobile">
                        <div id="demo" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                            </ul>
                            <!-- The slideshow -->
                            <!-- <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="slider-feature-card">
                                        <img src="https://tinypng.com/images/social/website.jpg" alt="">
                                        <h3 class="slider-title">SRVC</h3>
                                        <p class="slider-description">Freight Services - Cambodia Co., Ltd. </br> WORLDWIDE FREIGHT SERVICES
                                            SINCE 2008</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="slider-feature-card">
                                        <img src="./upload/srvc.png" alt="">
                                        <h3 class="slider-title">SRVC</h3>
                                        <p class="slider-description">Freight Services - Cambodia Co., Ltd. </br> WORLDWIDE FREIGHT SERVICES
                                            SINCE 2008</p>
                                    </div>
                                </div>
                            </div> -->
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type='text/javascript'></script>
</body>

</html>