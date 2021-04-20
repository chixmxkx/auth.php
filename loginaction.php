<?php session_start();

$_SESSION['email_address'] = $current_user;
$_SESSION['password'] = $passwordFromUser;

$allUsers = scandir("db/users/");
$countAllUsers = count($allUsers);
    
for($counter = 0; $counter < $countAllUsers; $counter++){

    $currentUser = $allUsers[$counter];

    if($currentUser == $email_address . ".json"){
        $userString = file_get_contents("db/users/".$currentUser);
        $userData = json_decode($userString);
        $passwordFromDB = $userData -> password;

        $passwordFromUser = password_verify($password, $passwordFromDB);

        if($passwordFromDB == $passwordFromUser){
            echo "You are now signed in";
            header("Location: home.php");
            die();
        }
        else{$_SESSION["ERROR"] = "Invalid Password. Try again";
            header("Location: login.php"); 
            die();  

        }        
    }

}
$_SESSION['error'] = "Invalid Email Address or Password";
header("Location: login.php");
die();
    
?> 