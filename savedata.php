<html>
    
    <title></title>
    <head>
    <style>
          html, body {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
             /* Optional: Set a background color */
        }

        .image {
            text-align: center;
            padding: 20px;
            height: 20%;
            width: 70%;
             /* Optional: Add a border for better visibility */
        }
    </style>
    </head>
   
    <body>

<?php
$name=$_POST['fullname'];
$number=$_POST['mobileno'];
$email=$_POST['emailid'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$blood_group=$_POST['blood'];
$address=$_POST['address'];
$conn=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
$sql= "INSERT INTO donor_details(donor_name,donor_number,donor_mail,donor_age,donor_gender,donor_blood,donor_address) values('{$name}','{$number}','{$email}','{$age}','{$gender}','{$blood_group}','{$address}')";
if($result=mysqli_query($conn,$sql) or die("query unsuccessful."))
{
    header("Refresh: 20;url=http://donationcamp.php/");
?>

    <script type="text/javascript">
                        window.setTimeout(function() {
                            location.href = 'donationcamp.php';
                        }, 2000);
    </script>
     <img src="image\checklist.png"   class="image">
     <br>
     <h2>Successful</h2>
<?php
}


//header("Location: http://localhost/blood/home.php");

mysqli_close($conn);
 ?>
    </body>
</html>