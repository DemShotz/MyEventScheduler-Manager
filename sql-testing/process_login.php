<?php
include_once "db_connect.php";
include_once "functions.php";

sec_session_start(); // Our custom secure way of starting a PHP session

if(isset($_POST['email'], $_POST['p'])) {
     $email = $_POST['email'];
     $password = $_POST['p']; // The hashed password.
     $rememberme = $_POST['remember_me'];

     if(login($email, $password, $mysqli) == true) {
          // LOGIN successful
          header("Location: ../index.php");
          exit();
     } else {
          //Login failed :(
          header("Location: ../login.php?error=" . $GLOBALS['error']);
          exit();
     }
} else {
     // The correct POST variables were not sent to this page
     echo "Invalid request";
}

?>
