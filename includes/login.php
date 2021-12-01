<?php include "db.php"?>
<?php session_start(); ?>
<?php 
    if(isset($_POST['login'])){
        $user_login = $_POST['user_login'];
        $password = $_POST['user_password'];

        $user_login = mysqli_real_escape_string($connection, $user_login);
        $password = mysqli_real_escape_string($connection, $password);
   
   
        $query = "SELECT * FROM users WHERE user_login = '{$user_login}'";
        $select_user_query = mysqli_query($connection, $query);
        if (!$select_user_query) {
   
            die("QUERY FAILED" . mysqli_error($connection));
   
        }
   
   
        while($row = mysqli_fetch_array($select_user_query)) {
   
            // $db_user_id = $row['user_id'];
            $db_user_login = $row['user_login'];
            $db_user_password = $row['user_password'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_permisstion = $row['user_permission'];

        }


        // $password = crypt($password, $db_user_password);


        if($user_login === $db_user_login && $password === $db_user_password){
                $_SESSION['user_login'] = $db_user_login;
                $_SESSION['user_firstname'] = $db_user_firstname;
                $_SESSION['user_lastname'] = $db_user_lastname;
                $_SESSION['user_permission'] = $db_user_permisstion;

                header("location: ../admin/");             
            
            }else{
                header("location: ../"); 
            }

        
    }

?>