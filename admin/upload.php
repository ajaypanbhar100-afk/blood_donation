<?php
   // check if an image file was uploaded
   if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
      $name = $_FILES['image']['name'];
      $type = $_FILES['image']['type'];
      $data = file_get_contents($_FILES['image']['tmp_name']);
      // connect to the database
      $pdo = new PDO('mysql:host=localhost;dbname=blood_donation', 'root', '');
      // insert the image data into the database
      $stmt = $pdo->prepare("INSERT INTO gallery (name, data) VALUES (?,?)");
      $stmt->bindParam(1, $name);
      
      $stmt->bindParam(2, $data);
      $stmt->execute();
      header("Location:galleryadd.php");
   }
?>