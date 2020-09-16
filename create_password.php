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
                <h2>Create New Password</h2>
                <p>MyChat</p>
            </div>

            <div class="form-roup">
                <label>Enter Password</label><br>
                <input type="password" name="pass1" placeholder="Password"
                autocomplete="off" class="form-control" required>
            </div>
           <br>
            <div class="form-roup">
                <label>Confirm Password</label><br>
                <input type="password" name="pass2" placeholder="Confirm Password"
                autocomplete="off" class="form-control" required>
            </div>
            <br>

                <div class="form-group">
                    <button type="submit" class="btn-btn-primary btn-block btn-lg" name="change"
                    >
                        Change
                    </button>
            </div>
        </form>
    </div>
    <?php

        session_start();

        include("include/connection.php");

        if(isset($_POST['change']))
        {
            $user = $_SESSION['user_email'];
            $pass1 = $_POST['pass1'];
            $pass2= $_POST['pass2'];

            if($pass1 !==$pass2)
            {
                echo"
                    <div class='alert alert-danger'>
                        <strong style='color:black';text-align='center';>Your New Password didn't Match with Confirm Password</strong>
                    </div>

                ";
            }
            if($pass1 < 9 AND $pass2 < 9 )
            {
                echo"
                    <div class='alert alert-danger'>
                        <strong>Use 9 or more than 9 Characrers</strong>
                    </div>

                ";
            }

            if($pass1 == $pass2)
            {
                $update_pass= mysqli_query($con, "UPDATE `users` SET user_pass = '$pass1'
                   WHERE  user_email='$user'");

                session_destroy();
                echo "<script> alert ('Go ahead and signin.')</script>";
                echo "<script>window.open('signin.php','_self')</script>";


            }
        }


      
    ?>
    
</body>
</html>