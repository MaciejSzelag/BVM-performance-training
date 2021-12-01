<?php 

function alertFaild($message){
    echo '<div class="alert alert-danger">'.$message.'</div>';
}
function alertSuccess($message){
    echo '<div class="alert alert-success">'.$message.'</div>';
}

function addRecordToPerformens($users_performens_year, $users_performens_month,$users_performens_login,$user_id, $users_performens_produce, $users_performens_daily_produce, $users_performens_dump, $users_performens_repro, $users_performens_avg_time){
    global $connection;

    $successMsg = "New record has been added";
    alertSuccess($successMsg);

    $query = "INSERT INTO users_performens(users_performens_year, users_performens_month,users_performens_login,user_id, users_performens_produce, users_performens_daily_produce, users_performens_dump, users_performens_repro, users_performens_avg_time ) VALUES('$users_performens_year', '$users_performens_month', '$users_performens_login', '$user_id', '$users_performens_produce', '$users_performens_daily_produce', '$users_performens_dump', '$users_performens_repro', '$users_performens_avg_time' )";
    $add_new_records = mysqli_query($connection, $query);
    $users_performens_year = null;
    $users_performens_month = null;
    $users_performens_login = null;
    $users_performens_produce = null;
    $users_performens_daily_produce = null;
    $users_performens_dump = null;
    $users_performens_repro = null;
    $users_performens_avg_time = null;

    if(!$add_new_records){

        die( mysqli_error($connection));
    }


    header('Location: users.php?source=view_user&user_id='.$user_id .'');


}

function mysqliQuery($query){
    global $connection;
    return mysqli_query($connection, $query);

}

function confirmQuery($mysqliQuery){
    global $connection;
    if(!$mysqliQuery){
        die("Query faild". mysqli_error($connection));
    }
}

function deletePosition($get_id_name, $table_name, $table_column_id,   $header_location){
    global $connection;
    if(isset($_GET['delete'])){
        $get_id_name = $_GET['delete'];
        $query = "DELETE FROM $table_name WHERE $table_column_id = $get_id_name";
        $select_mysqli_query = mysqli_query($connection, $query);
        confirmQuery($select_mysqli_query);
        header("Location: $header_location");
    }
}


?>

