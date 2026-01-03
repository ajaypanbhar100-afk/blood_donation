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
    include 'session.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>

<div id="header">
<?php include 'header.php';
?>
</div>
<div id="sidebar">
<?php 
$active="camp";
 include 'sidebar.php'; ?>

</div>
<div id="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title">Add Camp Info</h1>
        </div>
      </div>
      <hr>
      <?php if(isset($_POST['add']))
      {
        $info=$_POST['info'];
        $city=$_POST['city'];
        $date = date('Y-m-d', strtotime($_POST['date']));
        $add=$_POST['address'];
        $conn=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
        $sql= "INSERT INTO campinfo(campinfo,city,date,location) values('{$info}','{$city}','{$date}','{$add}')";
        $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
      echo '<div class="alert alert-success"><b>Camp Added Successfully.</b></div>';

        mysqli_close($conn);
      }
      ?>


      <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
            <div class="panel-heading">Add Camp</div>
            <div class="panel-body">
              <form method="post"  name="change_contact" class="form-horizontal">

      <div class="form-group">
                  <label class="col-sm-4 control-label"> Camp Information:</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" value="" name="info" id="info" required>
                  </div>
         </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Camp City:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="city" id="city" value="" required>
                  </div>
        </div>
        <div class="form-group">
                  <label class="col-sm-4 control-label"> Camp Date</label>
                  <div class="col-sm-8">
                  <input type="date" class="form-control" value="" name="date" id="date" required>
                  </div>
         </div>
      <div class="form-group">
                  <label class="col-sm-4 control-label">Camp Address:</label>
                  <div class="col-sm-8">
                   
                    <textarea class="form-control" name="address" id="address" required></textarea>
                  </div>
        </div>

                <div class="hr-dashed"></div>




                <div class="form-group">
                  <div class="col-sm-8 col-sm-offset-4">

                    <button class="btn btn-primary" name="add" type="submit">Add</button>
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>

      </div>


        </div>
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

</body>
</html>
