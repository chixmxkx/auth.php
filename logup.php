<?php session_start();

include_once('LIB/header.php')

?>

<title>Signup Page</title>

<body>

    <h1>Sign up</h1>
    
    <p>

        <?php
            if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
                echo $_SESSION['message'];
                session_destroy();
            }
        ?>
    
    </p>

    <form method = "POST" action = "logupaction.php" >
        
      <?php
          if(isset($_SESSION['ERROR']) && !empty($_SESSION['ERROR'])){
             echo $_SESSION ['ERROR'];
          session_unset();
          }
      ?>
        <div>
        <label>Full Name</label><br/>
        <input 
        <?php
            if(isset($_SESSION['full_name'])){
                echo "value=" .$_SESSION['full_name'];
            }
        ?>
        type = "text" name = "full_name" placeholder = "Full Name" required/>
        </div>

        <div>
        <label>Email Address</label><br/>
        <input
        <?php
            if(isset($_SESSION['email_address'])){
                echo "value=" .$_SESSION['email_address'];
            }
        ?> 
        type = "email" name = "email_address" placeholder = "Email Address" required/>
        </div>

        <div>
        <label>Phone Number</label><br/>
        <input 
        <?php
            if(isset($_SESSION['phone_number'])){
                echo "value=" .$_SESSION['phone_number'];
            }
        ?>
        type = "text" name = "phone_number" placeholder = "Phone Number" required/>
        </div>

        <div>
        <label>Date of Birth</label><br/>
        <input 
        <?php
            if(isset($_SESSION['date_of_birth'])){
                echo "value=" .$_SESSION['date_of_birth'];
            }
        ?>
        type = "date" name = "date_of_birth" placeholder = "Date of Birth" required/>
        </div>

        <div>
        <label>Password</label><br/>
        <input
        <?php
            if(isset($_SESSION['password'])){
                echo "value=" .$_SESSION['password'];
            }
        ?> 
        type = "password" name = "password" placeholder = "Password" required/>
        </div>

        <div>
        <label>Account Type</label><br/>
        <select>
        <?php
            if(isset($_SESSION['account_typr'])){
                echo "value=" .$_SESSION['account_type'];
            }
        ?>
        <option>Personal</option>
        <option>Business</option>
        </select>
        </div>

        <button type = "submit" name = "submit"> SIGNUP </button>

    </form>
         
</body>

<a href = "index.php"> Index </a> |
<a href = "login.php"> Signin </a> |
<a href = "logup.php"> Signup </a> 