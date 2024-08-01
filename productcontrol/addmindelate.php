<?php
$cnn = new mysqli("localhost", "root", "root", "db_phone_shop");
$getID = $_POST['id'];
$sql = "SELECT * FROM  tbl_product WHERE id=$getID";
$result = mysqli_query($cnn, $sql); 
$row = mysqli_fetch_assoc($result);
$sql = "DELETE FROM tbl_product WHERE id='$getID'";
$result = $cnn->query($sql);
if ($result) {
    unlink("../allimage/imageproduct/" . $row['pro_img']);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(array('success' => true));
    exit;
}
