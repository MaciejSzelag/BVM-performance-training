<div class="work-instruction-list-container">
<h1>BVM - work instructions</h1>


    <?php include "../admin/work-instructions/includes/work_instraction_nav.php"; ?>



    <div class="list-container">

           
            <table>
                <h1>Workplaces</h1>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Workplace</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>  
                            <?php 
                           
                                     
                                        $query = "SELECT * FROM  workplace WHERE workplace_id";
                                        $select_workplace_id = mysqli_query($connection,$query);
                                        $count_id = mysqli_fetch_assoc($select_workplace_id);
                                        for($i = 1; $i < count($count_id);){
                                            $query = "SELECT * FROM  workplace ";
                                            $select_workplace = mysqli_query($connection,$query);
                                              if(!$select_workplace){
                                                       die(mysqli_error($connection));
                                                   }
                                             while($row = mysqli_fetch_assoc($select_workplace)){
                                            $workplace_id = $row['workplace_id'];
                                            $workplace_name = $row['workplace_name'];
                            ?>
                               <tr> 
                                    <td><?php  echo $i++;?></td>                                  
                                    <td><?php echo $workplace_name; ?></td>
                                    <td><a href="work-instruction.php?source=all_workplaces&delete=<?php echo $workplace_id; ?>">Delete</a></td>
                                    <?php
                                                            

                                                        if(isset($_GET['delete'])){
                                                             $workplace_id = $_GET['delete'];
                                                             $query = "SELECT * FROM workplace WHERE workplace_id = $workplace_id";
                                                             $select_workplace_id = mysqli_query($connection, $query);
                                                             while($row = mysqli_fetch_assoc($select_workplace_id)){
                                                                    $take_workplace_name = $row['workplace_name'];
                                                                    $query = "DELETE FROM work_instructions WHERE workplace = '$take_workplace_name' ";
                                                                    $delete_query = mysqli_query($connection, $query);
                                                                    mysqliQuery($delete_query);

                                                             }
                                                            deletePosition($workplace_id, 'workplace', 'workplace_id', 'work-instruction.php?source=all_workplaces');

                                                         }
                                    
                                    ?>
                               

                                    <!-- dokonczyc delete  -->



                                </tr>




                 

                                    <?php }
                                        }?>
            
                </tbody>
                        </table>
        
    </div>
  
        
      
  

</div>

