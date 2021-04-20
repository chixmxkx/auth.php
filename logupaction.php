<?php session_start();

if(isset($_POST['submit'])){
    $full_name = $_POST['full_name'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $password = $_POST['password'];
    $account_type = $_POST['account_type']; 

    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);
    $newUserID = ($countAllUsers-1);

    $userData = [
        'id' => $newUserID,
        'full_name' => $full_name,
        'email_address' => $email_address,
        'phone_number' => $phone_number,
        'date_of_birth' => $date_of_birth,
        'password' => password_hash($password,PASSWORD_DEFAULT),
        'account_type' => $account_type
    ];  

    for($counter = 0; $counter < $countAllUsers; $counter++){

            $currentUser = $allUsers[$counter];

            if($currentUser == $email_address . ".json"){
                $_SESSION["error"] = "Registration Failed. User already exist";
                header("Location: logup.php");
                die();
            }
    }

    file_put_contents("db/users/". $email_address. ".json", json_encode($userData));

    $_SESSION["message"] = "Registration Successful! You can now signin";
    echo $_SESSION["message"]; 
    header("Location: login.php");   
}
else{
    $_SESSION["error"] = "There was a problem with your registration";
    echo $_SESSION["error"]; 
    header("Location: logup.php");
}
?> 