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
    <title>ACCOUNT SETTINGS</title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   
</head>
<body>
    <div class="row">
      <div class="col-sm-2">
      </div>
      <?php

        $user = $_SESSION['user_email'];
        $get_user = "SELECT * FROM `users` WHERE user_email='$user'";

        $run_user = mysqli_query($con, $get_user);
        $row = mysqli_fetch_array($run_user);

        $user_name = $row['user_name'];
        $user_pass = $row['user_pass'];
        $user_email = $row['user_email'];
        $user_profile= $row['user_profile'];
        $user_country = $row['user_country'];
        $user_gender = $row['user_gender'];

      ?>
      <div class="col-sm-8">
        <form action="" method="POST" enctype="multipart/form-data"> 
          <table class="table table-bordered table-hover" >
            <tr align="center">
              <td colspan="6" class="active">
                <h2> Change Account Settings</h2>
              </td>
            </tr>

            <tr>
            <td style="font-weight: bold;">Change Your Username
            </td>
            <td>
              <input type="text" name="u_name" class="form-control" required value="
              <?php echo $user_name;?>"/>
            </td>
            </tr>

            <tr><td></td>
            <td> <a class="btn btn-default" style="text-decoration: none; font-size: 15px;"
            href="upload.php">
          <i class="fa fa-user" aria-hidden="true">
             Change Profile
             </i>
          </a></td></tr>

          <tr>
            <td style="font-weight: bold;">Change Your Email
            </td>
            <td>
              <input type="email" name="u_email" class="form-control" required value="
              <?php echo $user_email;?>"/>
            </td>
            </tr>

            <tr>
              <td style="font-weight: bold;">Country
              </td>
              <td>
              <select  class="form-control" name="u_country">
                <option><?php echo $user_country;?></option>
                <option> USA</option>
                <option>UK</option>
                <option>UAE</option>
                <option>India</option>
              </select>
              </td>
              </tr>

              <tr>
                <td style="font-weight: bold;">Gender
                </td>
                <td>
                <select  class="form-control" name="u_gender">
                  <option><?php echo $user_gender;?></option>
                  <option> Male</option>
                  <option>Female</option>
                  <option>Others</option>
                </select>
                </td>
                </tr>

                <tr>
                  <td style="font-weight: bold;">Forgotten Password 
                  </td>
                  <td>
                    
                    <button type="button" class="btn btn-default" data-toogle="modal"
                    data-target="#myModal">  FORGOTTEN PASSWORD
        
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">
                            </button> 
                           </div>
                    

                              <div class="modal-body">
                                <form action="recovery.php?id=<?php echo $user_id;?>" method="POST" id="f">
                                  <strong>
                                    What is your School Best Friend Name?
                                  </strong>
                                  <textarea class="form-control" cols="83" rows="4" name="content"
                                  placeholder="Someone">
                                  </textarea><br>
                                  <input class="btn btn-default" type="submit" name="sub" value="Submit"
                                  style="width: 100px;"><br><br>

                                  <pre>Answer the above questions we will ask you the question if you forgot your
                                    <br> Password.
                                  </pre>
                                  <br><br>
</button>
                                </form>

                                <?php

                                  if(isset($_POST['sub']))
                                  {
                                    $bfn = htmlentities($_POST['content']);

                                      if($bfn == '')
                                      {
                                        echo "<script> alert ('Please Enter Something.')</script>";

                                        echo "<script>window.open('account_settings.php','_self')</script>";

                                      exit();
                                      }
                                    
                                        else{
                                        $update = "UPDATE `users` SET forgotten_answer='$bfn' WHERE
                                         user_email='$user'";

                                        $run = mysqli_query($con, $update);

                                                                
                                        if($run)
                                        {
                                          echo "<script> alert ('Working ...')</script>";

                                          echo " <script>window.open('account_settings.php','_self')</script>";
                                        }

                                        else
                                        {
                                          echo "<script> alert ('Error While Updating Information .')</script>";

                                          echo " <script>window.open('account_settings.php','_self')</script>";
                                        }
                                      }
                                    
                                  
                                    }
                                  
                                ?>
                              </div>
                              <!--
                              
                                 <div class="modal-footer">
                                    <button type="button " class="btn btn-default" data-dismiss="modal">
                                  Close
                                </button>

                              </div>
                                  -->
                         </div>


                      </div>

                    </div>

                  </tr>

                  <tr>
                    <td>
                    </td>
                      <td>
                        <a class="btn btn-default" href="change_password.php" style="text-decoration: none;
                        font-size: 15px;">
                        <i class="fa fa-key fa-fw" aria-hidden="true"></i>
                        Change Password
                                  </a>
                      </td>
                  </tr>

                  <tr align="center">
                    <td colspan="6">
                      <input type="submit" value="Update" name="update" class="btn btn-info">

                    </td>

                  </tr>


          </table>

        </form>

        <?php

          if(isset($_POST['update']))
          {
            $user_name = htmlentities($_POST['u_name']);
            $email = htmlentities($_POST['u_email']);
            $u_country = htmlentities($_POST['u_country']);
            $u_gender = htmlentities($_POST['u_gender']);
            

            $update = "UPDATE `users` SET user_name = '$user_name' , user_email = '$email',
            user_country = '$u_country',user_gender = '$u_gender' where user_email='$user'";

            $run = mysqli_query($con, $update);

            if($run)
            {
              echo "<script>window.open('account_settings.php','_self')</script>";
            }

          }


        ?>

      </div>
      <div class="col-sm-2">

      </div>
    </div>
 </body>
</html>
<?php
}
?>