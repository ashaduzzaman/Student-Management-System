<h1 class="text-primary"><i class="fa fa-users"></i> All Users</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-users"></i> All Users</li>
        </ol>
    </nav>


<div class="table-responsive">
                                    <table id="data" class="table table-hover table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Udername</th>
                                    
                                                <th>Photo</th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $db_info = mysqli_query($link, "SELECT * FROM `users`");
                                        while ($row = mysqli_fetch_assoc($db_info)) { ?>
                                                <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo ucwords($row['name']); ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['username']; ?></td>                                                
                                                <td><img height="100" width="100" src="images/<?php echo $row['photo']; ?>" alt=""></td>
                                            </tr>

                                        <?php

                                    }

                                    ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>