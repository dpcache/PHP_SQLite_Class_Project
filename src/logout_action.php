<!-- 
Jiaying Lin 
Dec, 9 2020
-->

<?php
  if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
  }
  unset($_SESSION['username']);
  unset($_SESSION['logged_in']);
  
  require('login.php');
  
?>