


 <div class="form-wrap">
      <?php
                      if(isset($_POST['submit'])){
                          $workplace = $_POST['workplace_name'];
                          $query = "SELECT * FROM workplace WHERE workplace_name = '$workplace'";
                          $select_workplace_query = mysqli_query($connection, $query);
                          $row = mysqli_fetch_assoc($select_workplace_query);
                          $workplace_name = $row['workplace_name'];


                          if($select_workplace_query -> num_rows > 0){
                              $alert_message = "Workplace exist.";
                              alertFaild($alert_message);

                          }else{
                              $query = "INSERT INTO workplace(workplace_name) VALUES ('$workplace')";
                              $add_workplace = mysqli_query($connection, $query);
                              $alert_message = "Workplace has been succefully added.";
                              if(!$add_workplace){

                                die(mysqli_error($connection));
                              }
                              alertSuccess($alert_message);

                          }

                        
                      }
      ?>
     <form action="" method="post"  >
            <div class="list-title">
              <h1>Add workplace</h1>
            </div>
            <div class="input-group">
              <label for="">Workplace</label>
              <input type="text" name="workplace_name">
            </div>     
            <div class="input-group">
              <input type="submit" name="submit" value="Add">
            </div>
     </form>
 </div>

 


