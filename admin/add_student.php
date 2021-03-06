<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i> Add Student </li>
        </ol>
    </nav>

<?php

if(isset($_POST['addstudent'])){

   $name=$_POST['name'];
   $roll=$_POST['roll'];
   $class=$_POST['class'];
   $city=$_POST['city'];
   $parrentcontact=$_POST['parrentcontact'];

   $photo=explode('.',$_FILES['photo']['name']);
   $photo=end($photo);
   $photo_name=$roll.".".$photo;

   $input_error= array();
   if(empty($name))
   {
       $input_error['name']= "This field is required";
   }
   if(empty($roll))
   {
       $input_error['roll']= "This field is required";
   }
   if(empty($class))
   {
       $input_error['class']= "This field is required";
   }
   if(empty($city))
   {
       $input_error['city']= "This field is required";
   }
   if(empty($parrentcontact))
   {
       $input_error['parrentcontact']= "This field is required";
   }

   $query= "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `parrentcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$parrentcontact','$photo_name')";

   $result=mysqli_query($link,$query);
   if($result){
       $success= "Data insert success";
    move_uploaded_file($_FILES['photo']['tmp_name'],'student_images/'.$photo_name);

    
   } else{
        $error ="Data insert faild";
   }
}
?>






<div class="row">
<?php if(isset($success)){echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';}?>
<?php if(isset($error)){echo '<p class="alert alert-danger col-sm-6">'.$error.'</p>' ;}?>
</div>

<?php //if(isset($_SESSION['data_insert_success'])){echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';} unset($_SESSION['data_insert_success']);?>
<?php //if(isset($_SESSION['data_insert_faild'])){echo '<div class="alert alert-danger">'.$_SESSION['data_insert_faild'].'</div>';unset($_SESSION['data_insert_faild']);}?>
<div class="row">
    <div class="col-sm-6"> 
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Student name" class="form-control">            
                <label class="error"><?php if(isset($input_error['name'])){ echo $input_error['name'];}?></label>
            </div>
            <div class="form-group">
                <label for="roll">Roll</label>
                <input type="text" name="roll" id="roll" placeholder="Roll" class="form-control" pattern="[0-9]{6}">
                <label class="error"><?php if(isset($input_error['roll'])){ echo $input_error['roll'];}?></label>
                <label class="error"><?php if(isset($roll_error)){ echo $roll_error;}?></label>                
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control">
                    <option value="">--select--</option>
                    <option value="1st">Class 1</option>
                    <option value="2nd">Class 2</option>
                    <option value="3rd">Class 3</option>
                    <option value="4th">Class 4</option>
                    <option value="5th">Class 5</option>
                    <option value="6th">Class 6</option>
                    <option value="7th">Class 7</option>
                    <option value="8th">Class 8</option>
                    <option value="9th">Class 9</option>
                    <option value="10th">Class 10</option>

                </select>
                <label class="error"><?php if(isset($input_error['class'])){ echo $input_error['class'];}?></label>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" placeholder="City" class="form-control">
                <label class="error"><?php if(isset($input_error['city'])){ echo $input_error['city'];}?></label>
            </div>
            <div class="form-group">
                <label for="parrentcontact">Parrent Contact</label>
                <input type="text" name="parrentcontact" id="parrentcontact" placeholder="01*****" class="form-control" pattern="01[1|3|5|6|7|8|9][0-9]{8}">
                <label class="error"><?php if(isset($input_error['parrentcontact'])){ echo $input_error['parrentcontact'];}?></label>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo">            
            </div>
            <div>
                <input type="submit" value="Add Student" name="addstudent" class="btn btn-primary">
            </div>
            
        </form>
    </div>
</div>
