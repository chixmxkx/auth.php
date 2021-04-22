<?php session_start();

$password = sha1($_POST['password']);
$new_password = sha1($_POST['new_password']);
$confirm_password = sha1($_POST['confirm_password']);

if(isset($_SESSION['email_address'])){
    $email_address = $_SESSION['email_address'];
    $userString = file_get_contents("database/".$email_address . ".json", "r");
    $userData = json_decode($userString, true);

    if(isset($userData) && $userData['password'] == $password && $new_password == $confirm_password){
        $userData['password'] = $new_password;
        file_put_contents("database/" . $email_address . ".json" , json_encode($userData)); 
        header("Location: reset.php");
        $_SESSION['message'] = "Password Reset Successful";
    }
    else{
        $_SESSION['error'] = "Invalid Details. Try again";
        header("Location: reset.php");
        die();
    }
}  
