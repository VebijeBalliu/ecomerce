<?php 

include('dbserver.php');
include('errors.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    
    <link rel="stylesheet" type="text/css" href="signUpDesign.css">
    
    
</head>
<body>
 <div class="header" >
    <h2>Login</h2>
 </div>  
 <form method="post" action="loginForm.php">
 
 
  
    <div class="imput-group">
    
    <input type="text" name="email" placeholder="Enter your email here">
    </div>
    <br>
    <div class="imput-group">
   
    <input type="password" name="password" placeholder="Enter your password here">
    </div>
    <br>
   
    
    <div class="imput-group">
        <button type="submit" name="login" class="btn" >Sign in</button>
    </div>
    <p>New user? <a href="SignUpForm.php" >Sign up</a>   <a href="biaReset.php">ForgotPass</a></p>
    


 </form>
</body>
</html>
