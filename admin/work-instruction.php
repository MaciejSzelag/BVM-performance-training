<?php include "includes/admin_header.php";?>
        <div class="wrap">
        <?php include "includes/admin_navigation.php";?>
            <div class="container">

                <div class="title">
                    <?php


                    // if(isset($_GET['user_id'])){
                            $user_firstname = $_SESSION['user_firstname'];



                    // $query = "SELECT * FROM users WHERE user_id= $the_user_id";
                    // $select_all_users = mysqli_query($connection,$query);

                    //         $row = mysqli_fetch_assoc($select_all_users);
                    //         $user_id = $row['user_id'];
                    //         $user_firstname = $row['user_firstname'];
                    //         $user_lastname= $row['user_lastname'];
                         
                
                    ?>
                       <h1> <?php echo  $user_firstname .' see all your work instructions' ?>  </h1>
              

                <?php
            //  }
              ?>
                </div>

                <div class="row">
         

                <?php 
                    if(isset($_GET['source'])){
                            $source = $_GET['source'];

                    }else{
                        $source = "";
                    }
                    switch($source){
                 
                        // case "carter_mixer_computer";
                        // include "../admin/work-instructions/includes/WI-91a-Carter-Mixer-Computer.php";
                        // break;
                        case "add_new_work_instruction";
                        include "../admin/work-instructions/includes/add_new_work_instruction.php";
                        break;
                        case "workplace";
                        include "../admin/work-instructions/includes/add_workplace.php";
                        break;

                        case "all_workplaces";
                        include "../admin/work-instructions/includes/all_workplaces.php";
                        break;
                 
                       default:
                       include "work-instructions/all-work-instructions.php";
                       break;
                   }
                ?>












                         
                </div>

            </div>
        </div>
<?php include "includes/admin_footer.php";?>
