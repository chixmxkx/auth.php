<?php session_start();

if(isset($_POST['submit'])){
    $passwordFromUser = $_POST['password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $_SESSION['email_address'] = $email_address;
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

                if($new_password == $confirm_password){
                    $userString = file_get_contents("db/users/" .$currentUser);
                    $userData = json_decode($userString);
                    $userData -> password = password_hash($password, PASSWORD_DEFAULT);
                    unlink("db/users/" .$currentUser);
                    file_put_contents("db/users/" . $email_address . ".json" . json_encode($userData)); 
                    $_SESSION["message"] = "Password Reset Successful!";
                    header("Location: home.php");
                }
                else{
                    $_SESSION["ERROR"] = "Passwords do not match";
                    header("Location: reset.php"); 
                    die();  
                }
            }
            else{
                $_SESSION["ERROR"] = "Password Incorrect. Try again";
                header("Location: reset.php"); 
                die();  
            }        
        }

    }
    $_SESSION['error'] = "Invalid Email Address or Password";
    header("Location: home.php");
    die();
}
?> 
