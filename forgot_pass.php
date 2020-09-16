<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN TO YOUR ACCOUNT</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700"
    rel="stylesheet">
    <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/signin.css">
</head>
<body>
    <div class="sign-inform">
        <form action="" method="POST">
            <div class="header">
                <h2>Forgot Password</h2>
                <p>MyChat</p>
            </div>

            <div class="form-group">
                <label>Email</label><br>
                <input type="email" name="email" placeholder="someone@site.com"
                autocomplete="off" class="form-control" required >
            </div>

            <div class="form-roup">
                <label>Best Friend Name</label><br>
                <input type="text" name="bf" placeholder="Someone"
                autocomplete="off" class="form-control" required>
            </div>

            <br>
        
                <div class="form-group">
                    <button type="submit" class="btn-btn-primary btn-block btn-lg" name="submit"
                    >
                        Submit
                    </button>
                </div>
        </form>
        <br>
        <div class="text-center small" style="color:black;font-weight:bold;text-align:center;font-size:18px";>

            Back To Sign -in ?
            <a href="signup.php" style="color:darkblue;">Click here</a>
        </div>
  <?php
    session_start();

    include("include/connection.php");

        if(isset($_POST['submit']))
        {
            $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
            $recovery_account = htmlentities(mysqli_real_escape_string($con, $_POST['bf']));

            $select_user = "SELECT * FROM `users` WHERE user_email='$email' AND forgotten_answer='$recovery_account'";
            $query = mysqli_query($con , $select_user);

            $check_user = mysqli_num_rows($query);

            if($check_user == 1)
            {
                $_SESSION['user_email'] = $email;

                echo
                "
                <script>window.open('create_password.php','_self')</script>
                ";
            }
            
            else{
                echo "<script> alert ('Your email or bestfriend name is incorrect.')</script>";
                echo "<script>window.open('forgot_pass.php','_self')</script>";

            }
        }
  ?>
    
</body>
</html>