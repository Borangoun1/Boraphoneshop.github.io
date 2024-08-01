<?php
$getID=$_GET['id'];
$cnn= new mysqli("localhost", "root","root", "db_phone_shop");
$sql="DELETE FROM tb_student WHERE id='$getID'";
$result=$cnn->query($sql);
if($result){
header('location:showdata.php');
}
?>