<?php
$con = new mysqli("localhost", "root","root", "db_phone_shop");
?>
<!DOCTYPE HTML>
<html>

<head>
</head>
<link rel="stylesheet" href="../Electronic E-commerce Website/Electronic E-commerce Website/electronic shop/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./search.css">
<link rel="stylesheet" href="./sarech.css">
<link rel="stylesheet" href="../Electronic E-commerce Website/Electronic E-commerce Website/electronic shop/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
          <a class="nav-link hover-underline-animation pb-1 active" href="./cateiphone.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link hover-underline-animation pb-1 active" href="./bar-container/about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link hover-underline-animation pb-1 active" href="./bar-container/contact.php">Contact</a>
        </li>
<li class="nav-item">
            <a class="nav-link hover-underline-animation pb-1 active" href="./showdata.php">Delate</a>
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

<div class="container">
  <div class="row mt-5">
    <div class="col">
      <div class="card mt-5">
        <div class="card-header">
          <h2 class=" text-center text-danger">SHOW DATABASE</h2>
        </div>
        <div class="card-body">
          <table class="table table-bordered text-center">
            <tr class="bg-primary text-white">
              <td>ID</td>
              <td>IDtbstudent</td>
              <td>Name</td>
              <td>Email</td>
              <td>Password</td>
              <td>Gender</td>
              <td>Option</td>
            </tr>
            <?php
            $select = "select * from tb_student ORDER BY id DESC";
            $result = mysqli_query($con, $select);
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Pass']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><a href="./Edite.php?id= <?php echo $row['ID'] ?>" class="btn btn-success">Edite</a>
                  <a href="./Delate.php?id= <?php echo $row['ID'] ?>" class="btn btn-danger mx-3">Delate</a>
                </td>
              </tr>
            <?php
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script src=""></script>