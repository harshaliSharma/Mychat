<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE NEW ACCOUNT</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700"
    rel="stylesheet">
    <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>
    <div class="signup-inform">
        <form action="" method="POST">
            <div class="header">
                <h2>Sign Up</h2>
                <p>Fill out this form and start chatting with your friends</p>
            </div>
            <div class="form-group">
                <label>Username</label><br>
                <input type="text" name="user_name" placeholder="Example :Robin"
                autocomplete="off" class="form-control" required>
            </div>

            <div class="form-roup">
                <label>Password</label><br>
                <input type="password" name="user_pass" placeholder="Password"
                autocomplete="off" class="form-control" required>
            </div>
        <br>
            <div class="form-group">
                <label>Email Address</label><br>
                <input type="email" name="user_email" placeholder="someone@site.com"
                autocomplete="off" class="form-control" required>
            </div>

            <div class="form-roup">
                <label>Country</label><br>
                <select class="form-control " name="user_country" required>
                    <option disabled=""> Select a Country</option>
                    <option>India</option>
                    <option>UK</option>
                    <option>Banglore</option>
                    <option>France</option>
                    <option>United States of America</option>
                    </select>
            </div>

            <br>
            <div class="form-roup">
                <label>Gender</label><br>
                <select class="form-control " name="user_gender" required>
                    <option disabled=""> Select Your Gender</option>
                    <option>Male</option>
                    <option>Female </option>
                    <option>Others</option>
                    </select>
            </div>

            <br>
          
            <div class="form-group">
                <label class="Checkbox">
                    <input type="checkbox" required>
                    I Accept the <a href="#">Terms of Use</a> &amp; 
                    <a href="#">Privacy Policy</a>
                </label>
            </div>

                <br>

                <div class="form-group">
                    <button type="submit" class="btn-btn-primary btn-block btn-lg" name="sign_up">
                        Sign Up
                    </button>
                </div>

                <?php  include("signup_user.php"); ?>

            </div>
        </form>
        <div class="text-center small" style="color:black;font-size:18px;font-weight:bold;text-align:center";>

            Already have an Account ? 
            <a href="signin.php" style="color:darkblue;font-weight:bold";>Sign in Here</a>
        </div>
    </div>
    
</body>
</html>