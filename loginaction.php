<?php session_start();

if($_POST['email_address']){
    $email_address = trim($_POST['email_address']);
    $password = sha1($_POST['password']);

    $_SESSION['email_address'] = $email_address;

    $userString = file_get_contents("database/".$email_address . ".json", "r");
    $userData = json_decode($userString, true);

    if(empty($userData)){
        $_SESSION['ERROR'] = "Invalid Details. Try again";
        header("Location: login.php");
    }

    if($userData['email_address'] == $email_address && $userData['password'] == $password){
        $_SESSION["MESSAGE"] = "You are now signed in";
        echo $_SESSION["MESSAGE"];
        header("Location: home.php");
        die();
    }
    else{
        $_SESSION["ERROR"] = "Invalid Details. Try again";
        header("Location: login.php"); 
        die(); 
    }
}  
?> 