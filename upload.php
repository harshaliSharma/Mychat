<!DOCTYPE html>
<?php

session_start();

include("include/connection.php");
include("include/header.php");

if(!isset($_SESSION['user_email']))
{
    header("location:signin.php");
}
else
{
  ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Picture</title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   
</head>
<style>
  .card
{
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);;
    max-width: 400px;
    margin: auto;
    text-align: center;
    font-family: arial;

}

.card img{
    height: 200px;
}

.title
{
    color: grey;
    font-size: 18px;
}
button{
    border:none;
    outline: 0;
    display: inline-block;
    padding: 9px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 
    font-size: 18px;
}
#update_profile
{
  position: absolute;
  cursor: pointer;
  padding:10px;
  border-radius: 4px;
  color: white;
  background-color: #000;
}
label
{
  width: 100%;
  float: left;
  background-color: black;
  color: white;
  padding: 7px;
  display: table;

}
input[type="file"]
{
  display: none;
}
</style>
<body>
  <?php
    
    $user = $_SESSION['user_email'];
    $get_user = "SELECT * FROM `users` WHERE user_email='$user'";

    $run_user = mysqli_query($con, $get_user);
    $row = mysqli_fetch_array($run_user);

    $user_name = $row['user_name'];
    $user_profile = $row['user_profile'];

    echo"
      <div class='card'>
        <img src = '$user_profile'>
        <h1> $user_name</h1>
        <form method='post' enctype='multipart/form-data'>
            <label id ='update_pofile'>
              <i class='fa fa-circle-o' aria-hidden='true' ></i>
                Select Profile
            <input type='file' name='u_image' size='60' >
          
           
            <button id='button_profile' name='update'>&nbsp&nbsp&nbsp 
              <i class='fa fa-heart' aria-hidden='true'></i>
               Update Profile
            </button>
            </label>
        </form>
    </div>
    <br><br>
    ";

    if(isset($_POST['update']))
    {
      $u_image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];

      $random_number = rand(1,100);

      if($u_image == '')
      {
        echo "<script> alert('Please Select Profile')</script> ";
        echo "<script> window.open('upload.php','_self')</script>";
        exit();
      }
      else{
        move_uploaded_file($image_tmp,"images/$u_image.$random_number");

        $update = "UPDATE  `users` SET user_profile='images/$u_image.$random_number' WHERE user_email='$user'";

        $run = mysqli_query($con , $update);

        if($run)
        {
          echo "<script> alert('Your Profile Updated')</script> ";
        echo "<script> window.open('upload.php','_self')</script>";
        }
      }
    }
    ?>

  </body>
</html>
<?php
}
?>