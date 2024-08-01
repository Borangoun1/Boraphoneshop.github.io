<?php
if (isset($_POST["image"])) {
	$data = $_POST["image"];
	$user_name = $_POST['name'];
	$user_password = $_POST['password'];
	$user_type = $_POST['usertype'];
	$user_gmail = $_POST['gmail'];
	$user_adress = $_POST['adress'];
	$user_phone = $_POST['phonenumber'];

	$image_array_1 = explode(";", $data);

	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);

	$imgName =  time() . '.png';
	$imageName = 'allimage/imageuser_login/' . $imgName;

	file_put_contents($imageName, $data);

	$con = mysqli_connect("localhost", "root","root", "db_phone_shop");

	$qery = mysqli_query($con, "INSERT INTO tbl_user (u_img,u_name,u_pass,u_type,u_gmail,u_adress,u_phone) VALUE ('$imgName','$user_name','$user_password','$user_type','$user_gmail','$user_adress','$user_phone')");

	echo $imageName;
}
