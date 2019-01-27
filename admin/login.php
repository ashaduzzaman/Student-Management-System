<?php
require_once './database.php';
session_start();
if(isset($_SESSION['user_login'])){
        header('location: index.php');
    }
if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];


        $username_check= mysqli_query($link,"SELECT * FROM `users` WHERE `username` ='$username'");
        if(mysqli_num_rows($username_check) >0){
                $row = mysqli_fetch_assoc($username_check);
                if($row['password'] == md5($password)){
                   if($row['status']=='active'){
                           $_SESSION['user_login']=$username;
                        header('location:index.php');
                   } else{
                           $inactive = "Your account is not active";
                   }
                }else{
                        $wrong_pass ="Your password does not match";
                }
        }else{
                $username_error= "Could not find your account";
        }

}
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <div class="container">
        <h1 class="text-center">Student management system</h1><br>
        <h3 class="text-center">Admin login</h3><br>
                <div class="row">
                        <div class="col-sm-4 offset-4">
                                <form action="login.php" method="post">
                                <div>
                                        <input type="text" placeholder="User name" name="username" required="" class="form-control">
                                        <!--<label class="error"><?php if(isset($username_error)){echo $username_error;}?></label>-->
                                </div>
                                <br>
                                <div>
                                        <input type="password" placeholder="Password" name="password" required="" class="form-control">
                                        <!--<label class="error"><?php if(isset($wrong_pass)){echo $wrong_pass;}?></label>-->
                                </div>
                                <br>
                                <div>
                                        <input type="submit" value="login" name="login" class="btn btn-info float-right" >
                                </div>
                                </form>
                        </div>
                </div>
                <br>
        <?php if(isset($username_error)){echo '<div class="alert alert-danger col-sm-4 offset-4">'.$username_error.'</div>';} ?>
        <?php if(isset($wrong_pass)){echo '<div class="alert alert-danger col-sm-4 offset-4">'.$wrong_pass.'</div>';} ?>
        <?php if(isset($inactive)){echo '<div class="alert alert-danger col-sm-4 offset-4">'.$inactive.'</div>';} ?>



      </div>
    
  </body>
</html>