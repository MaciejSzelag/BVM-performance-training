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
       

            if($user_login == $users_performens_login_select){
   
              if($users_performens_year_select == $currentYear){
                if($users_performens_month_select == $lastMonth){
          
                  $element_names = ['Produced','Daily','Dumped','Repro','Average time per batch (sec)'];
                  $element_names_date = [$users_performens_produce_select,$users_performens_daily_produce_select,$users_performens_dump_select, $users_performens_repro_select, $users_performens_avg_time_select];
             
                      for($j = 0; $j < 5; $j++){
                           echo "['$element_names[$j]'".","."$element_names_date[$j]],"; 

                        }
              
                 
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

    <div id="columnchart_material" style="width: 100%; height: 500px; padding-bottom: 40px"></div>
</div>