<?php
session_start();
require_once './database.php';

if (!isset($_SESSION['user_login'])) {
    header('location: login.php');
}
?>


<!doctype html>
<html lang="en">
  <head>
    <title>SMS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css.css">
    <link rel="stylesheet" href="style.css">

    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/script.js"></script>

  </head>
  <body>
 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">SMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>-->
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-user"></i> Welcome</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-user-plus"></i> Add user</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-user"></i> Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
            <!--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>-->
        </div>
        </nav>
        <hr>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="list-group">
                        <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </a>
                        <a href="index.php?page=add_student" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Add Student</a>
                        <a href="index.php?page=all_student" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Student</a>
                        <a href="index.php?page=all_users" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Users</a>

                    </div>
                </div>
                <div class="col-sm-9">
                <div class="content">
                    <?php 
                    if(isset($_GET['page'])){
                        $content= $_GET['page'].'.php';
                    } else {
                        $content = './dashboard.php';
                    }
                    
                    
                    if(file_exists($content)){
                        require_once $content;
                    }else{
                        echo 'file not found';
                    }
                    
                    ?>
                
                </div>
            </div>
            </div>
        </div>
  </body>
</html>