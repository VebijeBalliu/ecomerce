<?php
include('adminServer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register admin</title>

   <link rel="stylesheet" type="text/css" href="signUpDesign.css">

</head>
<body>
<div class="header" >
        <h2>Register new admin</h2>
     </div> 



     <form method="post" action="adminSignUp.php">
     <div class="imput-group">
        <input type="text" name="username" required placeholder="Enter your username" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
</div>
<div class="imput-group">
        
      <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
</div>
<div class="imput-group">
        
      <input type="password" name="cpass" required placeholder="confirm your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
</div>
      <input type="submit" value="register now" class="btn" name="submit">
   </form>
   <?php
if(count($errors) > 0){
    foreach($errors as $error){
        echo '<div class="alert alert-danger">'.$error.'</div>';
    }
}
?>
















   
</body>
</html>

