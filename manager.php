<?php
include_once "sql-testing/db_connect.php";
include_once "sql-testing/functions.php";

sec_session_start();

if (isset($_SESSION['user_id'])) {
     $conn = "SELECT manager FROM members WHERE id='" . $_SESSION['user_id'] . "'";
     $result = $mysqli->query($conn);
     $manager = $result->fetch_assoc();
     $manager = $manager['manager'];

     if ($manager == 0) {
          echo "You do not have access to this area.";
          exit();
     }
}
?>
<!DOCTYPE html>
<html>
<head>
     <?php include "header.php"; ?>
     <title>MANAGER MODE</title>
</head>
<body>
     <div id="header">
          <h1>MANAGER MODE</h1>
          <a onclick="resetMenu()" href="#" id="dropdownList">Menu</a>
     </div>
     <div id="menu">
          <a href="manageJobs.php" id="manageJobs">Manage Jobs</a>
          <a href="calculateHours.php" id="calculateHours">Calculate Hours</a>
          <a href="fixPref.php" id="fixPref">12/24 Hour Preference</a>
          <a href="contactAdmin.php" id="contactAdmin">Contact Website Creator</a>
          <?php if ($manager == 1) : ?>
          <a href="manager.php" id="managerMode">Manager Functions</a>
          <?php endif; ?>
     </div>

     <table>
     <tbody>
          <tr>
               <th>Name</th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
          </tr>
          <tr>
               <td class="manager">Alex</td>
               <td class="manager">1:30AM-10:00PM SF Frontend/Cashier</td>
               <td class="manager">Testing 123</td>
               <td class="manager">Testing 123</td>
               <td class="manager">Testing 123</td>
               <td class="manager">Testing 123</td>
               <td class="manager">Testing 123</td>
               <td class="manager">Testing 123</td>
          </tr>
          <tr>
          </tr>
     </tbody>
     </table>


     <div class="bottom-nav">
          <a onclick="swipeRight()" href="#" id="swipeRight"> &rsaquo; </a>
          <a onclick="swipeLeft()" href="#" id="swipeLeft"> &lsaquo; </a>
          <?php if (login_check($mysqli) == true) : ?>
               <p class="session">Logged in as <?php echo htmlentities($_SESSION["username"]);?>! <a href="sql-testing/logout.php">Logout</a>.</p>
          <?php else : ?>
               <p class="session">You are not logged in. <a href="login.php">Log in.</a></p>
          <?php endif; ?>
     </div>
</body>
</html>
