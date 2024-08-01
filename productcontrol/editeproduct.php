<?php
$conn = new mysqli("localhost", "root", "root", "db_phone_shop");
?>
<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $product = $_POST['deteil_product'];
    $price = $_POST['price_p'];
    $sql = " UPDATE tbl_product SET p_name='$name',d_product='$product',price_p='$price' WHERE id=" . $id;

    if (mysqli_query($conn, $sql)) {
        // header('location:adminsarch.php');

        if (isset($_POST["image"])) {

            $data = $_POST["image"];

            $id = $_POST["id"];
             
            $sql = "SELECT * FROM  tbl_product WHERE id=$id";

            $result = mysqli_query($conn,$sql);
            
            $row = mysqli_fetch_assoc($result);

             unlink("../allimage/imageproduct/" . $row['pro_img']);

            $image_array_1 = explode(";", $data);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imgName = time() . '.png';

            $imageName = '../allimage/imageproduct/' . $imgName;

            file_put_contents($imageName, $data);
            
            $sql = mysqli_query($conn, "UPDATE tbl_product SET pro_img='$imgName' WHERE id='" . ($id) . "'");

        }
    }
}
