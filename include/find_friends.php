<!DOCTYPE html>
<?php

session_start();

include("find_friends_function.php");

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
    <title>SEARCH FOR FRIENDS</title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!--<link rel="stylesheet" type="text/css" href="../css/find_people.css">-->
<style>
  body{
    overflow-x: hidden;
}
.card
{
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);;
    max-width: 380px;
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
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
}

a{
    text-decoration: none;
    font-size: 22px;
    color: black;
}


button:hover,a:hover
{
    opacity: 0.7px;
}


form.search_forum input[type=text]
{
    padding: 10px;
    font-size: 17px;
    border-radius: 4px;
    border: 1px solid #343a40 !important;
    float: left;
    width: 80%;
    color: white;
    background: #343a40 !important;
}
.btn{
    float: right;
    width: 20%;
    padding: 10px;
    font-size: 17px;
    border: 1px solid #343a40 !important;
    border-left: none;
    cursor: pointer;
    background-color: #343a40 !important;
}

form.search_forum button:hover
{
    background: #343a40 !important;
}

form .search_forum form::after
{
    content: "";
    clear: both;
    display: table;
}

  </style>
</head>
<body>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark" href="#">
    <a class="navbar-brand" href="#">
      <?php

        $user = $_SESSION['user_email'];
        $get_user = "SELECT * FROM `users` where user_email='$user'";
        $run_user = mysqli_query($con, $get_user);
        $row = mysqli_fetch_array($run_user);

        $user_name = $row['user_name'];
        echo "<a class='navbar-nav' href='../home.php?user_name=$user_name' style='color:red;'>MyChat</a>";
      ?>
    </a>
      <ul class="navbar-nav">
        <li>
          <a style="color: white;text-decoration: none;font-size: 20px;"
          href="../account_settings.php">&nbsp &nbsp Settings
          </a>
        </li>
      </ul>
    </nav>
    <br>
    <div class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-4">
        
        <form class="search_forum" action="">
          <input type="text" name="search_query" placeholder="Search Friends" autocomplete="off" required>
          <button class="btn" type="submit" name="search_btn" style="text-align:right;">Search</button>
        </form>
      </div>
      <div class="col-sm-4">
      </div>
    </div>
  <br><br>     
  <?php search_user(); ?>
</body>
</html>
<?php

}
?>