<?php session_start();

if($_POST['email_address']){
    $email_address = trim($_POST['email_address']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //var_dump($password);
    //exit;

    $userString = file_get_contents("database/".$email_address . ".json", "r");
    $userData = json_decode($userString, true);

    if(empty($userData)){
        $_SESSION['ERROR'] = "Invalid Details. Try again";
        header("Location: login.php");
    }

    if($userData['email_address'] == $email_address && $userData['password'] == $password){
        $_SESSION["message"] = "You are now signed in";
        header("Location: home.php");
        die();
    }
    else{
        $_SESSION["error"] = "Invalid Password. Try again";
        header("Location: login.php"); 
        die(); 
    }
}  
?> 