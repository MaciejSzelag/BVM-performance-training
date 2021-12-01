
<?php include "includes/admin_header.php";?>
        <div class="wrap">
           <?php include "includes/admin_navigation.php";?>
            <div class="container">

                  <div class="title">
                          <h1>Welcome 
                          <?php 
                          $first_name = $_SESSION['user_firstname'];
                          $last_name = $_SESSION['user_lastname'];
                          
                          
                          echo $first_name . ' ' .$last_name;?></h1>
                      </div>

                  <div class="row">

                  <div class="table-wrap">
                                
                      <table class="t-list">
                        <h1>Basic Information</h1>
                                            <tr>
                                        
                                                <th>Name</th>
                                                <th>Lastname</th>
                                                <th>Your login</th>
                                            
                                                <th>Password</th>

                                            <?php 
                                            $user_login = $_SESSION['user_login'];
                                            $query = "SELECT * FROM users WHERE user_login = $user_login";
                                                $select_user_role_query = mysqli_query($connection, $query);

                                                $user_supervisor = mysqli_fetch_assoc($select_user_role_query);
                                                $user_role  = $user_supervisor['user_role'];
                                                if($user_role == "supervisor"){
                                            ?>
                                                <th>Your Manager</th>
                                            <?php }else { ?>
                                                <th>Supervisor</th>
                                            <?php } ?>
                                                <th>date_of_registration</th>
                                        

                                            </tr>
                                                <?php
                                                
                                                    // if(isset($_GET['user_id'])){
                                                    //     $the_user_id = $_GET['user_id'];
                                                        $user_login = $_SESSION['user_login'];
                                                        $query = "SELECT * FROM users WHERE user_login = $user_login";
                                                        $select_user_query = mysqli_query($connection, $query);

                                                        while($row = mysqli_fetch_assoc($select_user_query)){
                                                            $user_id = $row['user_id'];
                                                            $user_login = $row['user_login'];
                                                            $user_firstname = $row['user_firstname'];
                                                            $user_lastname = $row['user_lastname'];
                                                            $user_passwword = $row['user_password'];
                                                            $date_of_registration = $row['date'];
                                                            $user_supervisor = $row['supervisor'];
                                
                                                ?>
                                                <tr>
                                            
                                                    <td><?php echo  $user_firstname; ?></td>
                                                    <td><?php echo  $user_lastname; ?></td>
                                                    <td><?php echo  $user_login; ?></td>
                                                    <td><?php echo  $user_passwword; ?></td>
                                                    <td><?php echo  $user_supervisor; ?></td>
                                                    <td><?php echo  $date_of_registration; ?></td>
                                                
                                                
                                                </tr>
                                





                                                <?php }?>

                      </table>
                  </div>
                  <div class="table-wrap">
                        <h1>Additional information</h1>  
                        <table class="t-list">                                                            
                          <tr>
                            <th>Sick days</th>
                            <td>5</td>
                          </tr>
                          <tr>
                            <th>Holiday Annual Entitlement: </th>
                            <td>24</td>
                          </tr>
                          <tr>
                            <th>Holiday Taken</th>
                            <td>18.5</td>
                          </tr>
                          <tr>
                            <th>Holiday Left</th>
                            <td>5.5</td>
                          </tr>
                        </table>
                      </div>
                      <div class="charts-wrap">
                            <div class="chart">
                                <script type="text/javascript">
                                  google.charts.load('current', { 'packages': ['bar'] });
                                  google.charts.setOnLoadCallback(drawChart);

                                  function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                    
                                    


                                <?php 
                                        $query = "SELECT * FROM users_performens WHERE users_performens_login = $user_login";
                                        $select_login = mysqli_query($connection,$query);
                                        // echo "console.log(".$user_login. ")";
                                    // $row = mysqli_fetch_assoc($select_login);
                                    $currentYear = date('Y');
                                    $lastMonth = date('m') - 1;
                                    
                                    // echo "['December', 'December'],";  
                                    switch($lastMonth){
                                    
                                        case 1:
                                          echo "['January', 'Production'],";
                                        break;
                                        case 2:
                                          echo "['February', 'Production'],";
                                        break;
                                        case 3:
                                          echo "['March', 'Production'],";
                                        break;
                                        case 4:
                                          echo "['April', 'Production'],";
                                        break;
                                        case 5:
                                          echo "['May', 'Production'],";
                                        break;
                                        case 6:
                                          echo "['June', 'Production'],";
                                        break;
                                        case 7:
                                          echo "['July', 'Production'],";
                                        break;
                                        case 8:
                                          echo "['August', 'Production'],";
                                        break;
                                          case 9:
                                          echo "['September', 'Production'],";
                                        break;
                                          case 10:
                                          echo "['October', 'Production'],";
                                        break;
                                          case 11:
                                          echo "['November', 'Production'],";
                                        break;
                                          case 12:
                                          echo "['December', 'Production'],";
                                        break;


                                    }
                                    while($row = mysqli_fetch_assoc($select_login)){
                                    $users_performens_year_select = $row['users_performens_year'];
                                    $users_performens_month_select = $row['users_performens_month'];

                                    $users_performens_login_select = $row['users_performens_login'];


                                        $users_performens_produce_select = $row['users_performens_produce'];
                                        $users_performens_daily_produce_select = $row['users_performens_daily_produce'];
                                        $users_performens_dump_select = $row['users_performens_dump'];
                                        $users_performens_repro_select = $row['users_performens_repro'];
                                        $users_performens_avg_per_hour_select = $row['users_performens_avg_per_hour'];

                                        $users_performens_avg_time_select = $row['users_performens_avg_time'];
                                        $users_performens_date_update_select = $row['users_performens_date_update'];

                              
                                      
                                          





                                        if($user_login == $users_performens_login_select){
                              
                                          if($users_performens_year_select == $currentYear){
                                            if($users_performens_month_select == $lastMonth){
                                      
                                              $element_names = ['Produced','Daily','Dumped','Repro','Avg per hour'];
                                              $element_names_date = [$users_performens_produce_select,$users_performens_daily_produce_select,$users_performens_dump_select, $users_performens_repro_select, $users_performens_avg_per_hour_select];
                                              // for($i = 0; $i < 5; $i++){
                                                // for($k = 0; $k < 1 ; $k++){
                                                
                                                // for($i = 0; $i < 1; $i++){
                                                  for($j = 0; $j < 5; $j++){
                                                
                                                    
                                              

                                                      echo "['$element_names[$j]'".","."$element_names_date[$j]],"; 

                                                    }
                                          
                                                  // }
                                                  // }
                                              
                                                
                                              };
                                            



                                            
                                          }
                                        }
                                        
                                      }
                                  
                                
                                ?>
                                    
                                  ]);
                                    var options = {
                                      chart: {
                                        title: '<?php echo $user_firstname;?>\'s Performance',
                                        subtitle: 'Summary of the month',
                                      }
                                    };

                                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                    chart.draw(data, google.charts.Bar.convertOptions(options));
                                  }
                                </script>

                                <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
                      </div>
                      <div class="table-wrap">
                              <table class="t-list">
                                <h1>Annual summary</h1>
                                <tr>
                                  <th>Year</th>
                                  <th>Month</th>
                                  <th>Produced</th>
                                  <th>Daily Produced</th>
                                  <th>Dumped</th>
                                  <th>Repro</th>                         
                                </tr>
                                  <?php
                                        $query = "SELECT * FROM users_performens  WHERE users_performens_login = $user_login " ;
                                        $select_login = mysqli_query($connection,$query);

                                        $currentYear = date('Y');
                                        $lastMonth = date('m') - 1;
                                        while($row = mysqli_fetch_assoc($select_login)){
                                            $users_performens_year_select = $row['users_performens_year'];
                                            $users_performens_month_select = $row['users_performens_month'];
                                            $users_performens_login_select = $row['users_performens_login'];
                                            $users_performens_produce_select = $row['users_performens_produce'];
                                            $users_performens_daily_produce_select = $row['users_performens_daily_produce'];
                                            $users_performens_dump_select = $row['users_performens_dump'];
                                            $users_performens_repro_select = $row['users_performens_repro'];
                                            $users_performens_avg_per_hour_select = $row['users_performens_avg_per_hour'];
                                            $users_performens_avg_time_select = $row['users_performens_avg_time'];
                                            $users_performens_date_update_select = $row['users_performens_date_update'];

                                  ?>
                                <tr>
                                    <td>
                                      <?php echo  $users_performens_year_select; ?>
                                    </td>
                                    <td>
                                      <?php 
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
                                    ?>
                                    </td>
                                    <td>
                                      <?php echo  $users_performens_produce_select; ?>
                                    </td>
                                    <td>
                                      <?php echo  $users_performens_daily_produce_select; ?>
                                    </td>
                                    <td>
                                      <?php echo  $users_performens_dump_select; ?>
                                    </td>
                                    <td>
                                      <?php echo  $users_performens_repro_select; ?>
                                    </td>
                                 
                                  <!-- <td><a href="users.php?source=edit_user&user_id=<?php echo $user_id; ?>">Edit User</a></td> -->

                                </tr>

                                <?php }?>

                              </table>
                      </div>
                   
                    </div>
                </div>
            </div>
        </div>
<?php include "includes/admin_footer.php";?>



