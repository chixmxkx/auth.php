<?php session_start();
include_once('LIB/header.php') ?>

<title>Password Reset Page</title>

<body>
    <h1>Reset Password</h1>
    <h3> <?php 
    if(isset($_SESSION['err'])){
        echo $_SESSION['err'];
        session_unset();
    } 
    ?> </h3>
    <h3> <?php 
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        session_unset();
    } 
    ?> </h3>
    <h3> <?php 
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        session_unset();
    }    
    ?> </h3>
    <form action = "resetaction.php" method = "post">
        <p><label>Old Password</label><input type = "password" name = "password" required/></p>
        <p><label>New Password</label><input type = "password" name = "new_password" required/></p>
        <p><label>Confirm New Password</label><input type = "password" name = "confirm_password" required/></p>
        <p><button type = "submit" name = "submit"> UPDATE PASSWORD </button></p>
    </form>     
</body>

<a href = "home.php"> Home </a>|
<a href = "reset.php"> Reset Password </a> |
<a href = "logout.php"> Signout </a>