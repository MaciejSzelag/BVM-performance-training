


 <div class="form-wrap">
 <?php
                if(isset($_POST['submit'])){
                    $wi_title = $_POST['wi_title'];
                    $workplace_name = $_POST['workplace_name'];


                    $wi_doc = $_FILES['document']['name'];
                    $wi_doc_1_temp = $_FILES['document']['tmp_name'];

                   
                    $wi_image_1 = $_FILES['image1']['name'];
                    $wi_image_1_temp = $_FILES['image1']['tmp_name'];
                    $wi_image_2 = $_FILES['image2']['name'];
                    $wi_image_2_temp = $_FILES['image2']['tmp_name'];
                    $wi_image_3 = $_FILES['image3']['name'];
                    $wi_image_3_temp = $_FILES['image3']['tmp_name'];
                    $wi_image_4 = $_FILES['image4']['name'];
                    $wi_image_4_temp = $_FILES['image4']['tmp_name'];
                    $wi_image_5 = $_FILES['image5']['name'];
                    $wi_image_5_temp = $_FILES['image5']['tmp_name'];
                    $wi_image_6 = $_FILES['image6']['name'];
                    $wi_image_6_temp = $_FILES['image6']['tmp_name'];
                
                    move_uploaded_file($wi_doc_1_temp, "../admin/doc/$wi_doc");         
                
                    move_uploaded_file($wi_image_1_temp, "../admin/images/$wi_image_1");
                    move_uploaded_file($wi_image_2_temp, "../admin/images/$wi_image_2");
                    move_uploaded_file($wi_image_3_temp, "../admin/images/$wi_image_3");
                    move_uploaded_file($wi_image_4_temp, "../admin/images/$wi_image_4");
                    move_uploaded_file($wi_image_5_temp, "../admin/images/$wi_image_5");
                    move_uploaded_file($wi_image_6_temp, "../admin/images/$wi_image_6");
                    $query = "INSERT INTO work_instructions(instruction_title, wi_doc, workplace, instruction_pic_1, instruction_pic_2, instruction_pic_3, instruction_pic_4, instruction_pic_5, instruction_pic_6) VALUES ('$wi_title','$wi_doc', '$workplace_name','$wi_image_1', '$wi_image_2', '$wi_image_3', '$wi_image_4', '$wi_image_5', '$wi_image_6')";
                    $add_pic_query = mysqli_query($connection, $query);
                    if(!$add_pic_query){
                        die($connection);
                    }
               
                }
?>
    
     <form action="" method="post"  enctype="multipart/form-data">
     <div class="list-title">

<h1>Add New Instruction </h1>


</div>
         <div class="input-group">
             <label for="">Workplace</label>
             
             <select name="workplace_name" id="">
                <?php 
                    $query = "SELECT * FROM workplace";
                    $select_all_workplaces = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_all_workplaces)){
                            $workplace_name = $row['workplace_name'];
                ?>

                 <option value="<?php echo $workplace_name; ?>"><?php echo $workplace_name; ?></option>
        <?php } ?>
             </select>
         </div>
         <div class="input-group">
             <label for="">Title</label>
            <input type="text" name="wi_title">
         </div>
         <div class="input-group">
             <label for="">Add document(PDF/doc/docx)</label>
            <input type="file" name="document">
         </div>
         <div class="input-group">
             <label for="">Picture 1</label>
            <input type="file" name="image1" >
         </div>
         <div class="input-group">
             <label for="">Picture 2</label>
            <input type="file" name="image2" >
         </div>
         <div class="input-group">
             <label for="">Picture 3</label>
            <input type="file" name="image3" >
         </div>
         <div class="input-group">
             <label for="">Picture 4</label>
            <input type="file" name="image4" >
         </div>
         <div class="input-group">
             <label for="">Picture 5</label>
            <input type="file" name="image5" >
         </div>
         <div class="input-group">
             <label for="">Picture 6</label>
            <input type="file" name="image6" >
         </div>
         <!-- <div class="instruction-form-group">
             <label for="">Document</label>
            <input type="file">
         </div> -->
         <div class="input-group">

            <input type="submit" name="submit" value="Add">
         </div>
     </form>
 </div>


