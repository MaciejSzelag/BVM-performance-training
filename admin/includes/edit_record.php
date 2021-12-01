





<div class="form-wrap">

<?php 
        // $query = "SELECT * FROM users_ WHERE user_id";
        // $select_record_id = mysqli_query($connection,$query);
                  
     if(isset($_GET['user_record_id'])){  
         $record_id = $_GET['user_record_id'];  

      $query = "SELECT * FROM users_performens WHERE users_performens_id = $record_id";
      $select_record_id = mysqli_query($connection,$query);

   
      while($row = mysqli_fetch_assoc($select_record_id)){
        $users_performens_id = $row['users_performens_id'];
          $users_performens_year_select = $row['users_performens_year'];
          $users_performens_month_select = $row['users_performens_month'];

          $users_performens_login_select = $row['users_performens_login'];

          $user_id = $row['user_id'];
          $users_performens_produce_select = $row['users_performens_produce'];
          $users_performens_daily_produce_select = $row['users_performens_daily_produce'];
          $users_performens_dump_select = $row['users_performens_dump'];
          $users_performens_repro_select = $row['users_performens_repro'];
          $users_performens_avg_per_hour_select = $row['users_performens_avg_per_hour'];

          $users_performens_avg_time_select = $row['users_performens_avg_time'];
          $users_performens_date_update_select = $row['users_performens_date_update'];





            if(isset($_POST['save'])){


                $post_users_performens_produce_select = $_POST['users_performens_daily_produce_select'];
                $post_users_performens_daily_produce_select = $_POST['users_performens_daily_produce_select'];
                $post_users_performens_dump_select = $_POST['users_performens_dump_select'];
                $post_users_performens_repro_select = $_POST['users_performens_repro_select'];

                // $user_login = $users_performens_login_select;
                function updateResult($value_1,$value_2){
                 
                   $result = $value_1 + $value_2;

                    return $result;
                }
                $post_users_produce_select = updateResult($users_performens_produce_select,$post_users_performens_produce_select);
                $post_users_dump_select = updateResult($users_performens_dump_select,$post_users_performens_dump_select);
                $post_users_repro_select = updateResult($users_performens_repro_select,$post_users_performens_repro_select);

                $query = "UPDATE users_performens SET users_performens_produce = '$post_users_produce_select', users_performens_daily_produce = '$post_users_performens_daily_produce_select', users_performens_dump = '$post_users_dump_select', users_performens_repro = '$post_users_repro_select',users_performens_date_update = now() WHERE users_performens_id = $record_id";

                $update_record = mysqli_query($connection, $query);
                if(!$update_record ){

                    die(mysqli_error($connection));
 
                }

                header('Location: users.php?source=view_user&user_id='.$user_id .'');



            }











?>
    

 
    <form action="" method="post">
        <div class="form-title">
            <h1>Year: <?php echo $users_performens_year_select; ?></h1>
        </div>
        <div class="form-title">
            <h1 name="" value="<?php
            echo $users_performens_month_select; ?>">Month: <?php  
            switch($users_performens_month_select){
                case 1:
                    echo "January";
                break;
                case 2:
                    echo  "February";
                break;
                case 3:
                    echo  "March";
                break;
                case 4:
                    echo  "April";
                break;
                case 5:
                    echo  "May";
                break;
                case 6:
                    echo  "June";
                break;
                case 7:
                    echo  "July";
                break;
                case 8:
                    echo  "August";
                break;
                  case 9:
                    echo  "September";
                break;
                  case 10:
                    echo  "October";
                break;
                  case 11:
                    echo  "November";
                break;
                  case 12:
                    echo  "December";
                break;
          
                              
  
              } 
              
            ?></h1>
        </div>
        <div class="form-title">
            <h1 >Current made: <span><?php echo $users_performens_produce_select; ?></span></h1>
        </div>
      
        <div class="input-group">
            <label for="">Daily made</label>
            <input type="number" name="users_performens_daily_produce_select" placeholder=" <?php echo $users_performens_daily_produce_select; ?>" required>
        </div>
        <div class="input-group">
            <label for="">Dumped</label>
            <input type="number" name="users_performens_dump_select" placeholder=" <?php echo $users_performens_dump_select; ?>" >
        </div>
        <div class="input-group">
            <label for="">Repro</label>
            <input type="number" name="users_performens_repro_select" placeholder=" <?php echo $users_performens_repro_select; ?>" >
        </div>
        <div class="input-group">
     
            <input type="submit" name="save" value="Save">
        </div>
     
    </form>


    <?php }} ?>
    </div>
 </div>