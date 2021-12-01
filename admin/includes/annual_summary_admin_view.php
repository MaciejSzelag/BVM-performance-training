<div class="table-wrap">

        <table class="t-list">
          <tr>
            <th>Year</th>
            <th>Month</th>
            <th>Produced</th>
            <th>Daily Produced</th>
            <th>Dumped</th>
            <th>Repro</th>
            <th>Avg time per batch</th>
            <th>Edit record</th>
            <th>Delete record</th>
            <th>Last updated</th>
          </tr>
            <?php
                        
                

                  $query = "SELECT * FROM users_performens  WHERE users_performens_login = $user_login ORDER BY users_performens_id DESC";
                  $select_login = mysqli_query($connection, $query);

                  $currentYear = date('Y');
                  $lastMonth = date('m') - 1;
                  while($row = mysqli_fetch_assoc($select_login)){
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

            ?>


      <?php 
      // if(isset($_GET['user_login'])){




      // }


      ?>
          <tr>
              <td><?php echo  $users_performens_year_select;?></td>
              <td><?php  switch($users_performens_month_select){
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
              ?>
              </td>
              <td><?php echo  $users_performens_produce_select;?></td>
              <td><?php echo  $users_performens_daily_produce_select;?></td>
              <td><?php echo  $users_performens_dump_select;?></td>
              <td><?php echo  $users_performens_repro_select;?></td>
              <td><?php echo  $users_performens_avg_time_select;?></td>
              <td><a href="users.php?source=edit_record&user_record_id=<?php echo $users_performens_id; ?>">Edit record</a></td>
              <td><a href="users.php?source=view_user&delete=<?php echo $users_performens_id;?>">Delete</a></td>
              <td><?php echo $users_performens_date_update_select; ?></td>
            </tr>
      <?php }?>
      <?php 
      if(isset($_GET['delete'])){
        $the_record_id = $_GET['delete'];
        $query = "DELETE FROM users_performens WHERE 	users_performens_id = $the_record_id";
        $delete_record_query = mysqli_query($connection, $query);
        if(!$delete_record_query){
            die($delete_record_query);
        }
      header('location:users.php?source=view_user&user_id='. $user_id .'');
      }



      ?>
      </table>
</div>