






<?php include "includes/admin_header.php";?>
        <div class="wrap">
        <?php include "includes/admin_navigation.php";?>
            <div class="container">

                <div class="title">
                    <?php


                 
                            $user_firstname = $_SESSION['user_firstname'];



            
                    ?>
          
              

                <?php
            //  }
              ?>
                </div>

                <div class="row">












<div class="work-instruction-list-container">
<?php

if(isset($_GET['wi_id'])){

    $instruction_id = $_GET['wi_id'];
    $query = "SELECT * FROM work_instructions WHERE instruction_id = '$instruction_id'";
    $select_wi_pic = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_wi_pic)){
    $wi_title = $row['instruction_title'];
    $wi_pic1 = $row['instruction_pic_1'];
    $wi_pic2 = $row['instruction_pic_2'];
    $wi_pic3 = $row['instruction_pic_3'];
    $wi_pic4 = $row['instruction_pic_4'];
    $wi_pic5 = $row['instruction_pic_5'];
    $wi_pic6 = $row['instruction_pic_6'];

        





?>
    <div class="list-title">

        <h1 class="instruction-h1"><?php echo $wi_title;?></h1>

    </div>
    <?php include "../admin/work-instructions/includes/work_instraction_nav.php"; ?>   
    <div class="doc-container">
     
             <div class="img-container">
                <img src="../admin/images/<?php echo $wi_pic1;?>" alt="<?php echo $wi_pic1;?>">
            </div>
            <div class="img-container">
                <img src="../admin/images/<?php echo $wi_pic2;?>" alt="<?php echo $wi_pic2;?>">
            </div>
            <div class="img-container">
                <img src="../admin/images/<?php echo $wi_pic3;?>" alt="<?php echo $wi_pic3;?>">
            </div>
            <div class="img-container">
                <img src="../admin/images/<?php echo $wi_pic4;?>" alt="<?php echo $wi_pic4;?>">
            </div>
            <div class="img-container">
                <img src="../admin/images/<?php echo $wi_pic5;?>" alt="<?php echo $wi_pic5;?>">
            </div>
            <div class="img-container">
                <img src="../admin/images/<?php echo $wi_pic6;?>" alt="<?php echo $wi_pic6;?>">
            </div>


           <!-- <div class="img-container">
                <img src="../admin/images/Carter-Mixer-Computer-WI-91a-img-2.png" alt="">
            </div>
            <div class="img-container">
                <img src="../admin/images/Carter-Mixer-Computer-WI-91a-img-3.png" alt="">
            </div> -->



            
    </div>

    <?php } } ?>
</div>


</div>

</div>
</div>
<?php include "includes/admin_footer.php";?>