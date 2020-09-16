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
                <h2>Sign In</h2>
                <p>Login To My Chat</p>
            </div>

            <div class="form-group">
                <label>Email</label><br>
                <input type="email" name="email" placeholder="someone@site.com"
                autocomplete="off" class="form-control" required >
            </div>

            <div class="form-roup">
                <label>Password</label><br>
                <input type="password" name="pass" placeholder="Password"
                autocomplete="off" class="form-control" required>
            </div>

            <br>
            <div class="small" style="text-align:center">Forgot Password?
                <a href="forgot_pass.php">Click Here</a>
                </div>

                <br>

                <div class="form-group">
                    <button type="submit" class="btn-btn-primary btn-block btn-lg" name="sign_in"
                    >
                        Sign In
                    </button>
                </div>

                <?php include("signin_user.php"); ?>

            </div>
        </form>
        <div class="text-center small" style="color:black;font-size:18px;font-weight:bold;text-align:center";>

            Don't Have an Account?
            <a href="signup.php" style="color:darkblue;font-weight:bold";>Create One</a>
        </div>
    </div>
    
</body>
</html>