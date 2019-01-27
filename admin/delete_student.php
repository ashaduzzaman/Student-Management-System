<?php
require_once 'database.php';

$id= base64_decode($_GET['id']);

mysqli_query($link,"DELETE FROM `student_info` WHERE id=$id");

header("location:index.php?page=all_student");

?>