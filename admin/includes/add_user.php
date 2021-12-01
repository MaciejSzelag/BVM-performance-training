







<div class="form-wrap">
    
<?php 
if(isset($_POST['add_user'])){
        $user_login = $_POST['user_login'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname =  $_POST['user_lastname'];
        $user_password = $_POST['user_password'];
        $supervisor = $_POST['supervisor'];
        $user_role = $_POST['user_role'];
        $user_permission = $_POST['user_permission'];


            $query = "INSERT INTO users(user_login, user_firstname, user_lastname, user_password, supervisor,user_role,user_permission,date) VALUES ('$user_login', '$user_firstname', '$user_lastname', '$user_password',' $supervisor', '$user_role','$user_permission',now())";
            $add_new_person_query = mysqli_query($connection, $query);

                if(!$add_new_person_query){
                    die(mysqli_error($connection));
                }



           $alert_message = "User has been succefully added.";
           include "alert_succes_and_view.php";

}
 



?>

<form action="" method="post">
    <div class="form-title">
        <h1>Add new person</h1>
    </div>
    <div class="input-group">
        <label for="user_login">User Login</label>
        <select name="user_login" id="user_login">
            <option value="">Select available Login</option>




            <?php 
             for($i = 1; $i < 200; $i++){
                    $query = "SELECT * FROM users WHERE user_login = $i ";
                    $select_logins_numbers = mysqli_query($connection, $query);
                    $takenLogin = mysqli_fetch_assoc($select_logins_numbers);
                    $user_name_taken_login = $takenLogin['user_firstname'];
                    $user_lastname_taken_login = $takenLogin['user_lastname'];

                     if($select_logins_numbers->num_rows > 0) {
                      
                                echo "<option style='color: lightgrey;' disabled>". $user_name_taken_login." ". $user_lastname_taken_login ."</option>";
                                // echo "";
                          
                        
                     } else{
                        echo "<option value='". $i."'>".$i." </option>";


                     } 
                          

           
                        
            }
            ?>
           
         
        </select>
    </div>
    <div class="input-group">
        <label for="">Name</label>
        <input type="text" name="user_firstname" placeholder="Name" required>
    </div>
    <div class="input-group">
        <label for="">Lastname</label>
        <input type="text" name="user_lastname" placeholder="Lastname" required>
    </div>

    <div class="input-group">
        <label for="">Password</label>
        <input type="password" name="user_password" placeholder="Set password for new user" required>
    </div>
    <div class="input-group">
        <label for="">Select a supervisor</label>

        <select name="supervisor" id="supervisor">
            <option value="">Select Supervisor or Manager</option>
            <option value="Peter Pritchard">Manager - Peter Pritchard</option>
            <option value="Colin Ross">Colin Ross</option>
            <option value="Jordan Pearce">Jordan Pearce</option>
        </select>
        <div class="input-group">
        <label for="">Select a role</label>
        <select name="user_role" id="user_role">
                <option  value="worker">Select a role</option>
                <option value="worker">Worker</option>
                <option value="supervisor">Supervisor</option>
        </select>
        </div>
        <div class="input-group">
            <label for="">Set permissions</label>
            <select name="user_permission" id="user_permission">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
            
            </select>
        </div>
     
     
    </div>

    <div class="input-group">
        <input type="submit" name="add_user" value="Add">
    </div>
</form>
</div>