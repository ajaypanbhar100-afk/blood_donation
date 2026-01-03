<?php include 'session.php'; ?>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

#sidebar{position:relative;margin-top:-20px}
#content{position:relative;margin-left:210px}
@media screen and (max-width: 600px) {
  #content {
    position:relative;margin-left:auto;margin-right:auto;
  }
}
</style>
</head>

<body style="color:black">
  <?php
  include 'conn.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>
<div id="header">
<?php 
$active="galleryadd"; 
include 'header.php';
?>
</div>
<div id="sidebar">
<?php include 'sidebar.php'; ?>

</div>
<div id="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title">Add Gallery Image</h1>
        </div>
      </div>
      <hr>
      <form method="post" action="upload.php" enctype="multipart/form-data">
   <input type="file" name="image" />
   <input type="submit" name="submit" value="Upload" onclick="popup()"/>
</form>
       </div>
      </div>
      <?php
    } else {
        echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
        ?>
        <form method="post" name="" action="login.php" class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-8 col-sm-offset-4" style="float:left">

              <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
            </div>
          </div>
        </form>
    <?php }
     ?>
     <script>
     function popup() {
       alert("Data added Successfully.");
     }
     </script>
</body>
</html>
