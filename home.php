<?php session_start();

include_once('LIB/header.php')

?>

<title>Home Page</title>

    <h1>Welcome!</h1>

      <h3><?php
          echo $_SESSION['MESSAGE'];
        ?></h3>

<a href = "home.php"> Home </a> |
<a href = "reset.php"> Reset Password </a> |
<a href = "logout.php"> Signout </a>


