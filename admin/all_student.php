<h1 class="text-primary"><i class="fa fa-users"></i> All Students</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-users"></i> All Students</li>
        </ol>
    </nav>


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
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $db_info = mysqli_query($link, "SELECT * FROM `student_info`");
                                        while ($row = mysqli_fetch_assoc($db_info)) { ?>
                                                <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo ucwords($row['name']); ?></td>
                                                <td><?php echo $row['roll']; ?></td>
                                                <td><?php echo $row['class']; ?></td>
                                                <td><?php echo ucwords($row['city']); ?></td>
                                                <td><?php echo $row['parrentcontact']; ?></td>
                                                <td><img height="100" width="100" src="student_images/<?php echo $row['photo']; ?>" alt=""></td>
                                                <td>
                                                    <a href="index.php?page=update_students&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"> Edit</i></a>
                                                    &nbsp;&nbsp;
                                                    <a href="delete_student.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"> Delete</i></a>
                                                </td>
                                            </tr>

                                        <?php

                                    }

                                    ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>