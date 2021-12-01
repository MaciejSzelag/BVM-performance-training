



<?php include "includes/admin_header.php";?>
        <div class="wrap">
        <?php include "includes/admin_navigation.php";?>
            <div class="container">

                <div class="title">
                    <?php


                            $user_firstname = $_SESSION['user_firstname'];

                
                    ?>
                       <h1> <?php echo  $user_firstname .' see all your work instructions' ?>  </h1>
              

                <?php
 
              ?>
                </div>

                <div class="row">
            







  <?php 
                if(isset($_GET['delete'])){
                    $id_delete = $_GET['delete'];


    ?>

                <div class="alert-confirmation">
                <div class="confirm-box">
                <div class="confirm-box-txt-btn">
                <span>Are you sure you want to delete this instruction?</span></div>
                <div class="confirm-box-txt-btn">
                <a class="delete" href="delete_item.php?deleteItem=<?php echo $id_delete; ?>">Delete</a>
                <a class="cancel" href="work-instruction.php">Cancel</a></div>

                </div>
                </div>

<?php } ?>



<?php 


    if(isset($_GET['deleteItem'])){
        $confirm_delete_id = $_GET['deleteItem'];

        $query = "DELETE FROM work_instructions WHERE instruction_id = $confirm_delete_id";
        $delete_instruction_query = mysqli_query($connection, $query);

                if(!$delete_instruction_query){
                    die(mysqli_error($connection));
                }else{
                    header("Location: work-instruction.php");
                }

    }
?>



                         
                </div>

            </div>
        </div>
<?php include "includes/admin_footer.php";?>



