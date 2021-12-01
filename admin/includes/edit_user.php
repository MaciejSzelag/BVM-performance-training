





<div class="form-wrap">

<?php 
    if(isset($_GET['user_id'])){
            $the_user_id = $_GET['user_id'];
            $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
            $select_user_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_user_query)){


                $user_login = $row['user_login'];
                $user_firstname = $row['user_firstname'];
                $user_lastname =  $row['user_lastname'];
                $user_password = $row['user_password'];
                $supervisor = $row['supervisor'];
                $user_role = $row['user_role'];
                $user_permission = $row['user_permission'];


                if(isset($_POST['edit_user'])){

                    $user_login = $_POST['user_login'];
                    $user_firstname = $_POST['user_firstname'];
                    $user_lastname =  $_POST['user_lastname'];
                    $user_password = $_POST['user_password'];
                    $supervisor = $_POST['supervisor'];
                    $user_role = $_POST['user_role'];
                    $user_permission = $_POST['user_permission'];


                    $query = "UPDATE  users SET user_login= '$user_login', user_firstname = '$user_firstname', user_lastname = '$user_lastname', date = now(), user_password ='$user_password', user_role = '$user_role', supervisor = '$supervisor', user_permission = '$user_permission' WHERE user_id =  $the_user_id";
                    $edit_user_query = mysqli_query($connection, $query);
                  
                    $alert_message = "User has been succefully updated.";
                       // $alert_message;
            echo '<p class="alert alert-success">' . $alert_message .'</p>';
                }
                




    ?>  
    

 
    <form action="" method="post">
        <div class="form-title">
            <h1><?php echo $user_firstname ." ". $user_lastname?></h1>
        </div>
        <div class="input-group">
            <label for="user_login">User Login</label>
            <select name="user_login" id="user_login" >
          
                <option value="">Select available Login</option>
               <?php 
                 for($i = 1; $i < 200; $i++){
                        $query = "SELECT * FROM users WHERE user_login = $i ";
                        $select_logins_numbers = mysqli_query($connection, $query);
                        $takenLogin = mysqli_fetch_assoc($select_logins_numbers);
                        $user_name_taken_login = $takenLogin['user_firstname'];
                        $user_lastname_taken_login = $takenLogin['user_lastname'];
    
                         if($select_logins_numbers->num_rows > 0) {
                              



                            if($i == $user_login){
                            
                                    echo "<option style='color: red;' selected value='".$user_login."'>".$user_login ." </option>";
                                
                           

                            
                            }else{
                                echo "<option style='color: lightgrey;' disabled>". $user_name_taken_login." ". $user_lastname_taken_login ."</option>";
                                // echo "";
                          
                            }
                                    
                            
                         }else{
                            echo "<option value='". $i."'>".$i." </option>";
    
    
                         } 
                              
    
               
                            
                    }
                ?>
               
             
            </select>
        </div>
        <div class="input-group">
            <label for="">Name</label>
            <input type="text" name="user_firstname" placeholder="Name" value="<?php echo $user_firstname; ?>" required>
        </div>
        <div class="input-group">
            <label for="">Lastname</label>
            <input type="text" name="user_lastname" placeholder="Lastname" value="<?php echo $user_lastname; ?>" required>
        </div>
    
        <div class="input-group">
            <label for="">Password</label>
            <input type="password" name="user_password" placeholder="Set password for new user" value="<?php echo $user_password; ?>" required>
        </div>
        <div class="input-group">
            <label for="">Select a supervisor</label>
    
            <select name="supervisor" id="supervisor">
                <option value="<?php echo $supervisor; ?>"><?php echo $supervisor; ?></option>
                <option value="Peter Pritchard">Manager - Peter Pritchard</option>
                <option value="Colin Ross">Colin Ross</option>
                <option value="Jordan Pearce">Jordan Pearce</option>
            </select>
         
        </div>
        <div class="input-group">
            <label for="">Position</label>
           
            <select name="user_role" id="user_role">
                <option  value="<?php echo  $user_role; ?>"><?php echo $user_role; ?></option>
                <option value="worker">Worker</option>
                <option value="supervisor">Supervisor</option>
            </select>
         
        </div>
        <div class="input-group">
            <label for="user_permission">Set permissions</label>
            <select name="user_permission" id="user_permission">
            <option value="<?php echo  $user_permission; ?>"><?php echo  $user_permission; ?></option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
            
            </select>
        </div>
    
        <div class="input-group">
            <input type="submit" name="edit_user" value="Update">
         
        </div>
    </form>


    <?php }} ?>
    </div>
 </div>