<?php
include_once "db_connect.php";
include_once "functions.php";

sec_session_start();

$error_msg = "";

if (isset($_POST['clickedDate'], $_POST['customText'])) {
     $conn = "UPDATE events SET custom='" . $_POST['customText'] . "' WHERE eventid='" . $_POST['oldstuff'] . "' AND id='" . $_SESSION['user_id'] . "'";
     $result = $mysqli->query($conn);
     if ($result === false) {
          $error_msg .= "<p class='error'>An unknown error occured. Please contact the system admin</p>";
     }
     header("Location: ../index.php");
}
