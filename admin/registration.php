<?php

 require_once './database.php';
 session_start();
if(isset($_POST['registration'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];

    $photo=explode('.',$_FILES['photo']['name']);
    $photo=end($photo);
    $photo_name=$username.".".$photo;

    $input_error= array();
    if(empty($name))
    {
        $input_error['name']= "This field is required";
    }
    if(empty($email))
    {
        $input_error['email']= "This field is required";
    }
    if(empty($username))
    {
        $input_error['username']= "This field is required";
    }
    if(empty($password))
    {
        $input_error['password']= "This field is required";
    }
    if(empty($confirmpassword))
    {
        $input_error['confirmpassword']= "This field is required";
    }
if(count($input_error)==0)
{
   $email_check= mysqli_query($link,"SELECT * FROM `users` WHERE `email`='$email';");
        if(mysqli_num_rows($email_check)==0){
            $username_check= mysqli_query($link,"SELECT * FROM `users` WHERE `username`='$username';");
                if(mysqli_num_rows($username_check)==0){
                    if(strlen($password)>5){
                        if($password == $confirmpassword){
                            $password=md5($password);
                            $query="INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";
                            $result= mysqli_query($link,$query);
                                if($result){
                                 $_SESSION['data_insert_success']= "Data Inserted Successfully";
                                 move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
                                 header('location:registration.php');
                                }else{
                                    $_SESSION['data_insert_faild']= "Data Insert Faild";
                                }
                        }else{
                            $pass_match= "Password does not match";
                        }
                
                    }else{
                        $pass_error= "Password must be at least 6 characters";
                    }
                }else{
                    $username_error="This user name already exist";
                }
                
        } else{
            $email_error="This Email Address already exist";
        }
   

    
    

}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>User Registration form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">  
  </head>
  <body>
      
<div class="container ">
        <h1 class="text-center">User Registration Form</h1>
        <?php if(isset($_SESSION['data_insert_success'])){echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';} unset($_SESSION['data_insert_success']);?>
        <?php if(isset($_SESSION['data_insert_faild'])){echo '<div class="alert alert-danger">'.$_SESSION['data_insert_faild'].'</div>';unset($_SESSION['data_insert_faild']);}?>
          <hr>
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                <label for="name" class="control-label col-sm-1">Name</label>
                <div class="col-sm-4">
                <input class="form-control" type="text" id="name" name="name" placeholder="Enter Your Name" value="<?php if(isset($name)){echo $name;}?>">
                </div>
                <label class="error"><?php if(isset($input_error['name'])){ echo $input_error['name'];}?></label>
                </div>

                <div class="form-group">
                <label for="email" class="control-label col-sm-1">Email</label>
                <div class="col-sm-4">
                <input class="form-control" type="email" id="email" name="email" placeholder="Enter Your Email" value="<?php if(isset($email)) {echo $email;}?>">
                </div>
                <label class="error"><?php if(isset($input_error['email'])){ echo $input_error['email'];}?></label>
                <label class="error"><?php if(isset($email_error)){ echo $email_error;}?></label>                
                </div>

                <div class="form-group">
                <label for="username" class="control-label col-sm-1">Username</label>
                <div class="col-sm-4">
                <input class="form-control" type="text" id="username" name="username" placeholder="Enter Your Username" value="<?php if(isset($username)) {echo $username;}?>">
                </div>
                <label class="error"><?php if(isset($input_error['username'])){ echo $input_error['username'];}?></label>
                <label class="error"><?php if(isset($username_error)){ echo $username_error;}?></label>                
                </div>

                <div class="form-group">
                <label for="password" class="control-label col-sm-1">Password</label>
                <div class="col-sm-4">
                <input class="form-control" type="password" id="password" name="password" placeholder="Enter Your Password" value="<?php if(isset($password)) {echo $password;}?>">
                </div>
                <label class="error"><?php if(isset($input_error['password'])){ echo $input_error['password'];}?></label>
                <label class="error"><?php if(isset($pass_error)){ echo $pass_error;}?></label>
                </div>

                <div class="form-group">
                <label for="confirmpassword" class="control-label col-sm-1">Confirm Password</label>
                <div class="col-sm-4">
                <input class="form-control" type="password" id="confirmpassword" name="confirmpassword" placeholder="Enter Your Password Again" value="<?php if(isset($confirmpassword)) {echo $confirmpassword;}?>">
                </div>
                <label class="error"><?php if(isset($input_error['confirmpassword'])){ echo $input_error['confirmpassword'];}?></label>
                <label class="error"><?php if(isset($pass_match)){ echo $pass_match;}?></label>
                </div>

                <div class="form-group">
                   <label for="photo" class="control-label col-sm-1">Photo</label>
                    <div class="col-sm-4">
                        <input type="file" id="photo" name="photo">
                    </div>
                </div>

                <div class="col-sm-4">
                    <input type="submit" value="Registration" name="registration" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <br><br>
    <p>If you have an account please <a href="login.php">login</a></p>
    <hr>
    <div class="footer">
    <p>Copy right @Ashaduzzaman Ovi <?= date('Y')?> All Right Reserved</p>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>