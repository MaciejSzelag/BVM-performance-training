<div class="navigation">


        <?php
if($_SESSION['user_permission'] == "admin"){

?>
        <ul>
                <li><i class="fas fa-tachometer-alt"></i><a id="all_users" href="../admin/">Dashboard</a></li>
                <li><i class="fas fa-users"></i><a id="all_users" href="users.php">All users</a>
                <li class="show-list"><i class="fas fa-chalkboard-teacher"></i>Show workers<i class="fas fa-sort-down"></i>
                        <ul class="nav-list" id="nav-list">
                                <?php
                    $query = "SELECT * FROM users";
                    $select_all_users = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_all_users)){
                            $user_id = $row['user_id'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname= $row['user_lastname'];
                         
                
                    ?>
                                <li><i class="fas fa-user"></i><a href="users.php?source=view_user&user_id=<?php echo $user_id;?>"><?php echo  $user_firstname .' '.$user_lastname; ?></a>
                                </li>
                                <?php } ?>
                        </ul>
                </li>
              

                <li><i class="fas fa-user-plus"></i><a id="all_users" href="users.php?source=add_user">Add new user</a>
                </li>
                <li><li class="show-list"><i class="fas fa-book-open"></i><a  href="work-instruction.php">Work instructions</a></li>
                <li><i class="fas fa-user-plus"></i><a id="all_users" href="../includes/logout.php">Logout</a></li>

        </ul>
  
        <?php } else {?>

        
        <ul>
    
        <li><i class="fas fa-tachometer-alt"></i><a id="all_users" href="../admin/">Dashboard</a></li>
                <li><li class="show-list"><i class="fas fa-book-open"></i><a  href="work-instruction.php">Work instructions</a></li>
                <li><i class="fas fa-user-plus"></i><a id="all_users" href="../includes/logout.php">Logout</a></li>
        </ul>
        <?php } ?>
        
</div>
