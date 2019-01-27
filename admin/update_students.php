<h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update Student</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-pencil-square-o"></i> Update Student </li>
        </ol>
    </nav>


<?php

    require_once 'database.php';

    $id= base64_decode($_GET['id']);

    $query=mysqli_query($link,"SELECT* FROM `student_info` WHERE id=$id");
    
    $db_up = mysqli_fetch_assoc($query);

    if(isset($_POST['updatestudent'])){

        $name=$_POST['name'];
        $roll=$_POST['roll'];
        $class=$_POST['class'];
        $city=$_POST['city'];
        $parrentcontact=$_POST['parrentcontact'];
     
        
     
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
     
        $query= "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`parrentcontact`='$parrentcontact' WHERE `id`='$id'";
     
        $result=mysqli_query($link,$query);
        if($result){
            
            header("location:index.php?page=all_student");
         
     
         
        } 
     }

?>




<div class="row">
<?php if(isset($success)){echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';}?>
<?php if(isset($error)){echo '<p class="alert alert-danger col-sm-6">'.$error.'</p>' ;}?>
</div>

<div class="row">
    <div class="col-sm-6"> 
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Student name" class="form-control" value= "<?= $db_up['name']?>">            
                <label class="error"><?php if(isset($input_error['name'])){ echo $input_error['name'];}?></label>
            </div>
            <div class="form-group">
                <label for="roll">Roll</label>
                <input type="text" name="roll" id="roll" placeholder="Roll" class="form-control" pattern="[0-9]{6}" value= "<?= $db_up['roll']?>" >
                <label class="error"><?php if(isset($input_error['roll'])){ echo $input_error['roll'];}?></label>
                <label class="error"><?php if(isset($roll_error)){ echo $roll_error;}?></label>                
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control" >
                    <option value="">--select--</option>
                    <option <?php echo $db_up['class']=='1st'? 'selected=""':"";?> value="1st">Class 1</option>
                    <option <?php echo $db_up['class']=='2nd'? 'selected=""':"";?> value="2nd">Class 2</option>
                    <option <?php echo $db_up['class']=='3rd'? 'selected=""':"";?> value="3rd">Class 3</option>
                    <option <?php echo $db_up['class']=='4th'? 'selected=""':"";?> value="4th">Class 4</option>
                    <option <?php echo $db_up['class']=='5th'? 'selected=""':"";?> value="5th">Class 5</option>
                    <option <?php echo $db_up['class']=='6th'? 'selected=""':"";?> value="6th">Class 6</option>
                    <option <?php echo $db_up['class']=='7th'? 'selected=""':"";?> value="7th">Class 7</option>
                    <option <?php echo $db_up['class']=='8th'? 'selected=""':"";?> value="8th">Class 8</option>
                    <option <?php echo $db_up['class']=='9th'? 'selected=""':"";?> value="9th">Class 9</option>
                    <option <?php echo $db_up['class']=='10th'? 'selected=""':"";?> value="10th">Class 10</option>

                </select>
                <label class="error"><?php if(isset($input_error['class'])){ echo $input_error['class'];}?></label>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" placeholder="City" class="form-control" value= "<?= $db_up['city']?>">
                <label class="error"><?php if(isset($input_error['city'])){ echo $input_error['city'];}?></label>
            </div>
            <div class="form-group">
                <label for="parrentcontact">Parrent Contact</label>
                <input type="text" name="parrentcontact" id="parrentcontact" placeholder="01*****" class="form-control" pattern="01[1|3|5|6|7|8|9][0-9]{8}" value= "<?= $db_up['parrentcontact']?>">
                <label class="error"><?php if(isset($input_error['parrentcontact'])){ echo $input_error['parrentcontact'];}?></label>
            </div>
            
            <div>
                <input type="submit" value="Update Student" name="updatestudent" class="btn btn-primary">
            </div>
            
        </form>
    </div>
</div>
