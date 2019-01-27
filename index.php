<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Students management system</title>
  </head>
  <body>
         <div class="container">
         <br>
         <a class="btn btn-primary float-right" href="admin/login.php">login</a>
         <br>
         <h1 class="text-center">WQelcome to Student management system</h1>
         <br>
         <div class="row">
         <div class="col-sm-4 offset-4">
         <form action="" method="post">
                     <table class="table table-bordered">
                        <tr>
                           <td colspan="2" class="text-center"><label>Student Information</label></td>
                           
                        </tr>
                        <tr>
                           <td><label for="choose">Choose Class:</label></td>
                           <td>
                           <select class="form-control" name="choose" id="choose">
                           <option value="">--Select--</option>
                           <option value="1st">class 1</option>
                           <option value="2nd">class 2</option>
                           <option value="3rd">class 3</option>
                           <option value="4th">class 4</option>
                           <option value="5th">class 5</option>
                           <option value="6th">class 6</option>
                           <option value="7th">class 7</option>
                           <option value="8th">class 8</option>
                           <option value="9th">class 9</option>
                           <option value="10th">class 10</option>

                           </select>
                           </td>
                        </tr>
                        <tr>
                           <td><label for="roll">Roll:</label></td>
                           <td>
                           <input class="form-control" type="text" name="roll" pattern="[0-9]{6}" placeholder="Roll">
                           </td>
                        </tr>
                        <tr>
                           <td colspan="2" class="text-center"><input class="btn btn-info" type="submit" value="show info" name="show_info"></td>
                           
                        </tr>
                     </table>
            </form>
      </div>
     </div>

     <?php

     require_once './admin/database.php';
      if(isset($_POST['show_info'])){

            $class = $_POST['choose'];
            $roll = $_POST['roll'];
            
            $query = mysqli_query($link,"SELECT * FROM `student_info` WHERE `class`='$class' AND `roll`='$roll'");
            if(mysqli_num_rows($query)==1){
               $stu_data = mysqli_fetch_assoc($query);
               ?>
  <div class="row">
      <div class="col-sm-6 offset-3">
         <table class="table table-bordered">
            <tr>
               <td rowspan="5"><img src="admin/student_images/<?= $stu_data['photo']?>" alt="" width="150" height="150" class="img-thumbnail"></td>
               <td>Name</td>
               <td><?=ucwords($stu_data['name']);?></td>

            </tr>
            <tr>
               <td>Class</td>
               <td><?= $stu_data['class'];?></td>

            </tr>
            <tr>
               <td>Roll</td>
               <td><?= $stu_data['roll'];?></td>

            </tr>
            <tr>
               <td>City</td>
               <td><?=ucwords($stu_data['city']);?></td>

            </tr>
            <tr>
               <td>Parrent Contact</td>
               <td><?= $stu_data['parrentcontact'];?></td>

            </tr>
         </table>
      </div>
   </div>
               <?php
            } else{
               ?>
               <script>
                  alert('Data Not Found');
               </script>
               <?php
            }
        
      }
     ?>
  </div>

 


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>