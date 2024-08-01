<?php
$con = new mysqli("localhost", "root","root", "db_phone_shop");
?>

<cen

ter>
  <h1>Edite Data</h1>
  <?php
  if (isset($_GET['id'])) {
    $ID = mysqli_real_escape_string($con, $_GET['id']);
    $sql = "SELECT *FROM  tb_student WHERE id=$ID";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

  ?>
    <form action="?" method="POST">
      <input type="hidden" name="id" value="<?php echo $row['ID'] ?>">Name:
      <input type="text" name="name" value="<?php echo $row['name']; ?>"></br></br>Gmail:
      <input type="text" name="email" value="<?php echo $row['Email']; ?>"></br></br>Password:
      <input type="text" name="pass" value="<?php echo $row['Pass']; ?>"></br></br>Gender
      <input type="text" name="gender" value="<?php echo $row['gender']; ?>"></br></br>
      <input type="submit" name="submit" value="update">
    </form>
  <?php
  }
  ?>
</center>
<?php
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $gender = $_POST['gender'];
  $sql = " UPDATE tb_student SET name='$name', Email='$email',Pass='$pass',gender='$gender' WHERE id='".($id)."'";
  if (mysqli_query($con, $sql)){
   header('location:showdata.php');  
}
}
 ?>
