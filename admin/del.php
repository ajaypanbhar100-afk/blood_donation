<?php
include 'conn.php';
  $donor_id = $_GET['id'];
$sql= "DELETE FROM gallery where id={$donor_id}";
$result=mysqli_query($conn,$sql);

header("Location: gallerymanage.php");

mysqli_close($conn);

 ?>
