<div class="table-wrap">
<h1>Workers</h1>
<table class="t-list">
   
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Lastname</th>
            <th>User role</th>
            <th>User login</th>
        
            <th>Password</th>
            <th>Supervisor</th>
            <th>Permission</th>
            <th>date_of_registration</th>
        
            <th>Edit</th>
            <th>DELETE</th>

        </tr>
                <?php
                    $query = "SELECT * FROM users WHERE user_role = 'worker'";
                    $select_worker_query = mysqli_query($connection, $query);
                    $countUsers = mysqli_num_rows($select_worker_query);
                for($i = 1; $i < $countUsers;){


                    $query = "SELECT * FROM users";
                    $select_user_query = mysqli_query($connection, $query);
                   

                        while($row = mysqli_fetch_assoc($select_user_query)){
                            $user_id = $row['user_id'];
                            $user_login = $row['user_login'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_passwword = $row['user_password'];
                            $date_of_registration = $row['date'];
                            $user_supervisor = $row['supervisor'];
                            $user_role = $row['user_role'];
                            $user_permission = $row['user_permission'];

                
                
                            ?>
                            <?php 


                            if($user_role == "worker"){
                                

                            ?>
                    
                 <tr class="admin-hover">
                        <td><?php echo $i++; ?></td>   
                        <td><?php echo  $user_firstname; ?></td>   
                        <td><?php echo  $user_lastname; ?></td>
                        <td><?php echo  $user_role; ?></td>
                        <td><?php echo  $user_login; ?></td>
                        <td><?php echo  $user_passwword; ?></td>
                        <td><?php echo  $user_supervisor; ?></td>
                        <td><?php echo  $user_permission; ?></td>
                        <td><?php echo  $date_of_registration; ?></td>
                        <td><a href="users.php?source=edit_user&user_id=<?php echo $user_id; ?>">Edit User</a></td>
                        <td><a href="users.php?delete=<?php echo $user_id; ?>">Delete</a></td>
                     
                    </tr>
                    <?php }
                
                }
                     
                
            }?>

    </table>
    <table class="t-list">
        <h1>Supervisors</h1>
        <tr>

            <th>Name</th>
            <th>Lastname</th>
            <th>User role</th>
            <th>User login</th>
        
            <th>Password</th>
            <th>Manager</th>
            <th>Permission</th>
            <th>date_of_registration</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
                <?php
                
              
                $query = "SELECT * FROM users";
                $select_user_query = mysqli_query($connection, $query);



                while($row = mysqli_fetch_assoc($select_user_query)){
                    $user_id = $row['user_id'];
                    $user_login = $row['user_login'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_passwword = $row['user_password'];
                    $date_of_registration = $row['date'];
                    $user_supervisor = $row['supervisor'];
                    $user_role = $row['user_role'];
                    $user_permission = $row['user_permission'];
                    ?>
                    <?php 
                     if($user_role == "supervisor"){

                    ?>
                    
                    <tr class="admin-hover">
                  
                        <td><?php echo  $user_firstname; ?></td>
                        <td><?php echo  $user_lastname; ?></td>
                        <td><?php echo  $user_role; ?></td>
                        <td><?php echo  $user_login; ?></td>
                        <td><?php echo  $user_passwword; ?></td>
                        <td><?php echo  $user_supervisor; ?></td>
                        <td><?php echo  $user_permission; ?></td>
                        <td><?php echo  $date_of_registration; ?></td>
                        <td><a href="users.php?source=edit_user&user_id=<?php echo $user_id; ?>">Edit</a></td>


                        <?php 
                            if($user_permission === "admin"){   
                        ?>
                        <td id="blocked">Blocked</td>

                        <?php }else { ?>

                        <td><a href="users.php?delete=<?php echo $user_id; ?>">Delete</a></td>
                    </tr>
                    <?php }}
                    
                        
                }?>

                <?php 
   
                deletePosition($user_id, 'users', "user_id", 'users.php');

                ?>

    </table>

</div>