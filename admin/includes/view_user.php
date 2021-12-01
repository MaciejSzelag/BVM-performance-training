
<!-- Table - basic informations -->
<?php include "basic_data.php"; ?>
<!-- Table - basic informations -->

<!-- google column chart -->
<?php include "column_chart.php"; ?>
<!-- google column chart -->


<!-- annual summry admin view -->
<?php include "annual_summary_admin_view.php"; ?>
<!-- annual summry admin view -->

<?php
if($_SESSION['user_permission'] === "admin"){

?>
<div class="small-form-container">
  <div class="form-wrap">

    <form class="form" action="" method="post">
  <?php 

    if(isset($_POST['add_new'])){

      $users_performens_year = $_POST['users_performens_year'];
      $users_performens_month = $_POST['users_performens_month'];
      $users_performens_login = $_POST['users_performens_login'];
      $users_performens_produce = $_POST['users_performens_produce'];
      $users_performens_daily_produce = $_POST['users_performens_daily_produce'];
      $users_performens_dump = $_POST['users_performens_dump'];
      $users_performens_repro = $_POST['users_performens_repro'];
      $users_performens_avg_time = $_POST['users_performens_avg_time'];
      $user_id = $user_id;
      $currentYear = date('Y');
      $currentMonth = date('m');
        if($user_login == $users_performens_login){
              $query = "SELECT * FROM users_performens WHERE users_performens_login = $user_login";
              $select_login = mysqli_query($connection,$query);
              $row = mysqli_fetch_assoc($select_login);
              $users_year_select = $row["users_performens_year"];
              $users_month_select = $row['users_performens_month'];
              $users_login_select = $row['users_performens_login'];
              if($users_login_select == $users_performens_login){
                if($users_year_select == $users_performens_year){
                  if($users_month_select == $users_performens_month){
                    $dangerMSG = "Record exist";
                    echo alertFaild($dangerMSG);
          
                  }else{
                    addRecordToPerformens($users_performens_year, $users_performens_month,$users_performens_login,$user_id, $users_performens_produce, $users_performens_daily_produce, $users_performens_dump, $users_performens_repro, $users_performens_avg_time);
                  }
                
                }else{
                  addRecordToPerformens($users_performens_year, $users_performens_month,$users_performens_login,$user_id, $users_performens_produce, $users_performens_daily_produce, $users_performens_dump, $users_performens_repro, $users_performens_avg_time);
                }
              }else{
                addRecordToPerformens($users_performens_year, $users_performens_month,$users_performens_login,$user_id, $users_performens_produce, $users_performens_daily_produce, $users_performens_dump, $users_performens_repro, $users_performens_avg_time);
        
              }
          
          }
    }
  ?>


               <h1>Add <?php echo  $user_firstname . " " . $user_lastname; ?>  efficiency</h1>
                <div class="inputs">
                  <div class="input-group-user">
                    <label for="">Year</label>
                    <input type="text" name="users_performens_year" value="<?php $current_year = date('Y'); echo $current_year;
                    
                  
                    ?>"
                      readonly>
                  </div>
                  <div class="input-group-user">
                    <label for="">Month</label>
                          <select name="users_performens_month" id="">
                
                      <?php 
                          
                              for($i = 1; $i < date('m')+1; $i++){
                              switch($i){
                                    case 1:
                                        echo "<option value='1'>January</option>";
                                    break;
                                    case 2:
                                        echo  "<option value='2'>February</option>";
                                    break;
                                    case 3:
                                        echo  "<option value='3'>March</option>";
                                    break;
                                    case 4:
                                        echo  "<option value='4'>April</option>";
                                    break;
                                    case 5:
                                        echo  "<option value='5'> May</option>";
                                    break;
                                    case 6:
                                        echo  "<option value='6'>June</option>";
                                    break;
                                    case 7:
                                        echo  "<option value='7'>July</option>";
                                    break;
                                    case 8:
                                        echo  "<option value='8'> August</option>";
                                    break;
                                      case 9:
                                        echo  "<option value='9'> September</option>";
                                    break;
                                      case 10:
                                        echo  "<option value='10'> October</option>";
                                    break;
                                      case 11:
                                        echo  "<option value='11'> November</option>";
                                    break;
                                      case 12:
                                        echo  "<option value='12'> December</option>";
                                    break;
                                         
                              }                                                        
                                
                              };

                        ?>
                    </select>
                  </div>
                  <div class="input-group-user">
                    <label for=""><?php echo  $user_firstname . " ".$user_lastname; ?> - Login</label>
                    <input type="number" name="users_performens_login" value="<?php echo  $user_login; ?>" readonly>
                  </div>
                  <div class="input-group-user">
                    <label for="">Produced Batches</label>
                    <input type="number" name="users_performens_produce" value="0">
                  </div>
                  <div class="input-group-user">
                    <label for="">Daily produced</label>
                    <input type="number" name="users_performens_daily_produce" value="0">
                  </div>
                  <div class="input-group-user">
                    <label for="">Dump Batches</label>
                    <input type="number" name="users_performens_dump" value="0">
                  </div>
                  <div class="input-group-user">
                    <label for="">Repro Batches</label>
                    <input type="number" name="users_performens_repro" value="0">
                  </div>
                  <div class="input-group-user">
                    <label for="">Average batch production</label>
                    <input type="number" name="users_performens_avg_per_hour" value="0">
                  </div>
                  <div class="input-group-user">
                    <label for="">Avg time per batch</label>
                    <input type="number" name="users_performens_avg_time" value="0">
                  </div>
                </div>

                <div class="input-buttons">

            
                                    <div class="input-group-user sub">
                                              <input class="add" type="submit" name="add_new" value="Add new records">
                                          </div>
                                              
                </div>        

    </form>
  </div>
</div>

<?php } ?>

</div>