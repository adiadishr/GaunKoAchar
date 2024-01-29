<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
} else {
  $loggedin = false;
}
if (!$loggedin) {
  echo "<a href='login.php' class='sign' style='display: block; margin-top: 0px;'>Sign-In</a>
    <a href='registration.php' class='sign' style='display: block; margin-top: 0px;'>Sign-Up</a>";
} else {
  echo "<a href='logout.php' class='sign' style='display: block; margin-top: 0px;'>Sign-Out</a>";
}
?>
