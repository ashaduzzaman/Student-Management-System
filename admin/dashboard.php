
                        <h1 class="text-primary"><i class="fa fa-dashboard"></i> DashBoard <small>Statistics Overview</small></h1>
                             <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i> Dashboard </li>
                                </ol>
                             </nav>
                             <?php
                                $query_student= mysqli_query($link,"SELECT * FROM `student_info`");
                                $query_user= mysqli_query($link,"SELECT * FROM `users`");

                                $count_student = mysqli_num_rows($query_student);
                                $count_user = mysqli_num_rows($query_user);

                               

                                
                             
                             ?>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="card ">
                                            <div class="card-header bg-primary">
                                                <div class="row">
                                                    <div class="col-3" style="color:white"><i class="fa fa-users fa-5x"></i></div>
                                                    <div class="col-9" style="color:white">
                                                        <div class="float-right" style="font-size:40px"><?= $count_student;?></div>
                                                        <div class="clearfix"></div>
                                                        <div class="float-right">All Students</div>
                                                    </div>

                                                </div>
                                            </div>
                                            <a href="index.php?page=all_student">
                                                <div class="card-footer">
                                                    <span class="float-left">View all students</span>
                                                    <span class="float-right"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card ">
                                            <div class="card-header bg-primary">
                                                <div class="row">
                                                    <div class="col-3" style="color:white"><i class="fa fa-users fa-5x"></i></div>
                                                    <div class="col-9" style="color:white">
                                                        <div class="float-right" style="font-size:40px"><?= $count_user;?></div>
                                                        <div class="clearfix"></div>
                                                        <div class="float-right">All Users</div>
                                                    </div>

                                                </div>
                                            </div>
                                            <a href="index.php?page=all_users">
                                                <div class="card-footer">
                                                    <span class="float-left">View all users</span>
                                                    <span class="float-right"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    </div>
 
                                <hr>
                                <div class="table-responsive">
                                    <table id="data" class="table table-hover table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Roll</th>
                                                <th>Class</th>
                                                <th>City</th>
                                                <th>Contact number</th>
                                                <th>Photo</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $db_info = mysqli_query($link,"SELECT * FROM `student_info`");
                                            while($row= mysqli_fetch_assoc($db_info)){?>
                                                <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo ucwords($row['name']);?></td>
                                                <td><?php echo $row['roll'];?></td>
                                                <td><?php echo $row['class'];?></td>
                                                <td><?php echo ucwords($row['city']);?></td>
                                                <td><?php echo $row['parrentcontact'];?></td>
                                                <td><img height="100" width="100" src="student_images/<?php echo $row['photo'];?>" alt=""></td>
                                                
                                            </tr>

                                        <?php
                                            }

                                        ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                