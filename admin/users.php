<?php include "includes/admin_header.php";?>
        <div class="wrap">
        <?php include "includes/admin_navigation.php";?>
            <div class="container">

                <div class="title">
                    <?php


                    if(isset($_GET['user_id'])){
                            $the_user_id = $_GET['user_id'];



                    $query = "SELECT * FROM users WHERE user_id= $the_user_id";
                    $select_all_users = mysqli_query($connection,$query);

                            $row = mysqli_fetch_assoc($select_all_users);
                            $user_id = $row['user_id'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname= $row['user_lastname'];
                         
                
                    ?>
                       <h1> <?php echo  $user_firstname .' '.$user_lastname; ?>  </h1>
              

                <?php }?>
                </div>

                <div class="row">
            

                <?php 
                    if(isset($_GET['source'])){
                            $source = $_GET['source'];

                    }else{
                        $source = "";
                    }
                    switch($source){
                 
                        case "view_user";
                        include "includes/view_user.php";
                        break;
                        case "all_users";
                        include "includes/view_all_users.php";
                        break;
                        case "add_user";
                        include "includes/add_user.php";
                        break;
                        case "edit_user";
                        include "includes/edit_user.php";
                        break;
                        case "edit_record";
                        include "includes/edit_record.php";
                        break;
                            
                            
                       default:
                       include "includes/view_all_users.php";
                       break;
                   }
                ?>












                         
                </div>

            </div>
        </div>
<?php include "includes/admin_footer.php";?>
