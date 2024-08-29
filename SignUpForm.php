    
    <?php 
    include('dbserver.php');//lidhja me databazen
    include('errors.php');//shfaqja e gabimeve ne lidhje me format login dhe signup
   
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Page</title>
        <link rel="stylesheet" type="text/css" href="signUpDesign.css">
        
        
        
      <!--krijojme forme html me validimet perkatese  --->
    </head>
    <body>
     <div class="header" >
        <h2>Register</h2>
     </div> 
      
     <form method="post" action="SignUpForm.php">
        <?php 
        $errors = array();
        include('errors.php');?>
       <div class="imput-group">
        
       
        <input type="text" name="fname"  placeholder="Enter your first name here">
</div>
<div class="imput-group">
        <br>
        
        <input type="text" name="flastname"  placeholder="Enter your last name here" >
</div>
        <br>
        <div class="imput-group">
        
        <input type="date" name="date"  placeholder="mm/dd/yyy"><br>
</div>
        <br>
        <div class="imput-group">
        
        <input type="text" name="email"  placeholder="Enter your email here">
</div>
        <br>
        <div class="imput-group">
        
        <input type="password" name="password1"placeholder="Enter your pass here" 
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
</div>
        <br>
        <div class="imput-group">
        
        <input type="password" name="password2"placeholder="Enter your pass here"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
</div>
        <br>
</div>
<div class="imput-group">
    <button type="submit" name="signup" class="btn">Sign Up</button>
</div>
<p>Already a user?<a href="loginForm.php">Sign in</p>


     </form>
    </body>
    </html>