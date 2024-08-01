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
        <div class="container-fluid">
            <a class="navbar-brand" href="../srvc/upload/srvc.png" target="_blank">
                <a class="navbar-brand" href="index.html" id="logo"><span id="span1">E</span>Lectronic <span>Shop</span></a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link hover-underline-animation pb-1 active" aria-current="page" href="./Sarch.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link hover-underline-animation pb-1 active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgb(0, 91, 228);">
                            <li><a class="dropdown-item" href="./catesamsung.php">Samsung Phone</a></li>
                            <li><a class="dropdown-item" href="./cateiphone.php">Iphone Phone</a></li>
                            <li><a class="dropdown-item" href="./cateoppo.php">Oppo</a></li>
                            <li><a class="dropdown-item" href="./catevivo.php">vivo</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-underline-animation pb-1 active" href="./showdata.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-underline-animation pb-1 active" href="./bar-container/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-underline-animation pb-1 active" href="#">Contact</a>
                    </li>
                </ul>
                <form class="d-flex" action="?" method="POST" id="formSearch">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="name">
                    <button class="btn btn-outline-light" type="submit" name="submit">Search</button>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                </form>
            </div>
        </div>
    </nav>
    <div class="container" id="product-cards">
        <h1 class="text-center" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration='1400'>PRODUCTS</h1>
        <div class="row">
            <?php
            $search = 'iphone';
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