<?php 








    $query = "SELECT * FROM workplace";
    $select_workplace_query = mysqli_query($connection, $query);


   



  
    while($row = mysqli_fetch_assoc($select_workplace_query)){

            $workplace_name = $row['workplace_name'];
       
?>


    <div class="list-container">

            
            <table>
                <h1><?php echo $workplace_name; ?></h1>    
                            <thead>
                                <tr>
                                    <th>Instruction</th>
                                    <th>Download</th>
                                    
                                    <?php 
                                        if($_SESSION['user_permission'] === "admin"){
                                    ?>
                                    <th>Delete</th>
                                    <?php } ?>          

                                </tr>
                            </thead>
                            <tbody>  
                            <?php 


                                        $query = "SELECT * FROM work_instructions WHERE workplace = '$workplace_name'";
                                        $select_wi_pic = mysqli_query($connection,$query);
                                        if(!$select_wi_pic){
                                            die(mysqli_error($connection));
                                        }

                                        while($row = mysqli_fetch_assoc($select_wi_pic)){
                                            $wi_id = $row['instruction_id'];
                                            $wi_title = $row['instruction_title'];
                                            // $wi_pic1 = $row['instruction_pic_1'];
                                            $doc_name = $row['wi_doc'];

                                 

                                ?>
                    
                            
                                
                    
                                <tr>
                                    <td><a href="instruction.php?wi_id=<?php echo $wi_id; ?>"><?php echo $wi_title; ?></a></td>



                                    <td><a href="../admin/doc/<?php echo $doc_name; ?>" download>Download</a></td>
                              
                                    <?php 



                                    if($_SESSION['user_permission'] === "admin"){



                                   
                                    ?>
                                             <td><a class="delete" href="../admin/delete_item.php?delete=<?php echo $wi_id; ?>">Delete</a></td>

                                    <?php } ?>          

                                </tr>




                 

                <?php } ?>
            
                </tbody>
            </table>
        
    </div>
  
        
      
  
   <?php   } ?>