<?php session_start(); ?>
<?php 
             $_SESSION['user_login'] = null;
             $_SESSION['user_firstname'] = null;
             $_SESSION['user_lastname'] = null;
             $_SESSION['user_permission'] = null;
             header('location: ../');
?>