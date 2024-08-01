<?php
if (isset($_POST["image"])) {
	$data = $_POST["image"];
	$nameproduct = $_POST['product_name'];
	$detialpro = $_POST['d_product'];
	$pricepro = $_POST['p_price'];

	$image_array_1 = explode(";", $data);

	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);

	$imgName =  time() . '.png';
	$imageName = './allimage/imageproduct/' . $imgName;

	file_put_contents($imageName, $data);

	$con = mysqli_connect("localhost", "root","root", "db_phone_shop");

	$qery = mysqli_query($con, "INSERT INTO tbl_product (pro_img,p_name,d_product,price_p) VALUE ('$imgName','$nameproduct','$detialpro','$pricepro')");

}
