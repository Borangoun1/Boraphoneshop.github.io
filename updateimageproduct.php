<?php
if (isset($_POST["image"])) {

	$data = $_POST["image"];

    $id = $_POST["id"];

	$image_array_1 = explode(";", $data);

	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);

	$imgName =  time() . '.png';
	$imageName = 'allimage/imageproduct/' . $imgName;

	file_put_contents($imageName, $data);

	$con = mysqli_connect("localhost", "root","root", "db_phone_shop");

	$qery = mysqli_query($con, "UPDATE tbl_product SET pro_img='$imgName' WHERE id='" . ($id) . "'");

	echo $imageName;
}
