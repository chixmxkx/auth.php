<?php session_start();

if(isset($_POST['submit'])){
    $full_name = $_POST['full_name'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $password = $_POST['password'];
    $account_type = $_POST['account_type']; 
}
$allUsers = scandir("database/");
$countAllUsers = count($allUsers);
$newUserID = ($countAllUsers-1);

$userData = [
    'id' => $newUserID,
    'full_name' => $full_name,
    'email_address' => $email_address,
    'phone_number' => $phone_number,
    'date_of_birth' => $date_of_birth,
    'password' => sha1($password),
    'account_type' => $account_type
];  
for($counter = 0; $counter < $countAllUsers; $counter++){
    $currentUser = $allUsers[$counter];
    if($currentUser == $email_address . ".json"){
        header("Location: logup.php");
        $_SESSION["regerror"] = "Registration Failed. User already exist";
        die();
    }
    
}
file_put_contents("database/". $email_address. ".json", json_encode($userData));
header("Location: logup.php");
$_SESSION["regmes"] = "Registration Successful! You can now signin";
die();  
?> 