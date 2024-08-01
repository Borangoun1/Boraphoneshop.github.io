<?php
$conn = new mysqli("localhost", "root","root", "db_phone_shop");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./sarech.css">
    <link rel="stylesheet" href="../Electronic E-commerce Website/Electronic E-commerce Website/electronic shop/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-battambang-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <div class="top-navbar">
        <a class="navbar-brand" href="index.html" id="logo1"><span id="span1">Wel</span>come TO Bora <span>Phone SHOP</span></a>
        <div class="icons">
            <a href="./login.php" class="text-success"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>
            <a href="./reigesterform.php" class="text-primary"><i class="fa fa-sign-in" aria-hidden="true"></i>Register</a>
        </div>
    </div>
    <!-- top navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark color-bar border-top">
        <?php include './include/navbar.php'; ?>
    </nav>
    <div class="container" id="product-cards">
        <h1 class="text-center" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration='1400'>PRODUCTS Oppo</h1>
        <div class="row">
            <?php
            $search = 'oppo';
            $sql = "SELECT * FROM product WHERE p_name LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            $i = 1;
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
                        <div class="col-md-3 py-3 py-md-0" style="margin-top: 30px;" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration='1400'>
                            <div class="card round">
                                <img class="box" src="./imageproduct/<?php echo $row['pro_img']; ?>" alt="" class="image-contain max-height">
                                <div class="card-body">
                                    <h3 class="text-center"><?php echo $row['p_name']; ?></h3>
                                    <p class="text-center"><?php echo $row['d_product']; ?></p>
                                    <div class="star text-center">
                                        <i class="fa-solid fa-star checked"></i>
                                        <i class="fa-solid fa-star checked"></i>
                                        <i class="fa-solid fa-star checked"></i>
                                        <i class="fa-solid fa-star checked"></i>
                                        <i class="fa-solid fa-star checked"></i>
                                    </div>
                                    <h2>$<?php echo $row['price_p']; ?><span>
                                            <li class="fa-solid fa-cart-shopping"></li>
                                        </span></h2>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                } else {
                    ?>
                    <p class="text-danger">No result</p>

            <?php
                }
            } else {
                echo "Error in query: " . mysqli_error($conn);
            }
            ?>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        $('#formSearch').submit(function(e) {
            $('#loadingContainer').show();
            $('#productlist').hide();
        });
    </script>
</body>

</html>