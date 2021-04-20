<?php session_start();

include_once('LIB/header.php')

?>

<title>Login Page</title>

<body>

    <h1>Sign in</h1>

    <form method = "POST" action = "loginaction.php" >
        
      <?php
          if(isset($_SESSION['ERROR']) && !empty($_SESSION['ERROR'])){
             echo $_SESSION ['ERROR'];
          session_destroy();
          }
      ?>
        <div>
        <label>Email Address</label><br/>
        <input 
        <?php
            if(isset($_SESSION['email_address'])){
                echo "value=" .$_SESSION['email_address'];
            }
        ?>
        type = "email" name = "email_address" required/>
        </div>

        <div>
        <label>Password</label><br/>
        <input
        <?php
            if(isset($_SESSION['password'])){
                echo "value=" .$_SESSION['password'];
            }
        ?> 
        type = "password" name = "password" required/>
        </div>

        <button type = "submit" name = "submit"> LOGIN </button>

    </form>
         
</body>

<a href = "index.php"> Index </a>|
<a href = "login.php"> Signin </a> |
<a href = "logup.php"> Signup </a> 
