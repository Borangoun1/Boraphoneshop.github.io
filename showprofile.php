<?php
$con = new mysqli("localhost", "root","root", "db_phone_shop");
?>

<?php
if (isset($_GET['id'])) {
    $ID = mysqli_real_escape_string($con, $_GET['id']);
    $sql = "SELECT *FROM  tb_student WHERE id=$ID";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
?>
     <form action="?" method="POST">
     <?php echo $row['img']; ?>
     <img src="<?php echo $row['img']; ?>" alt="">
    </form>
<?php
}
?>
