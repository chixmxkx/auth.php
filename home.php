<?php session_start();

include_once('LIB/header.php')

?>

<title>Home Page</title>

    <h1>Welcome!</h1>

      <?php
          if(!isset($_SESSION['message'])){}
      ?> 
<a href = "home.php"> Home </a> |
<a href = "reset.php"> Reset Password </a> |
<a href = "logout.php"> Signout </a>


