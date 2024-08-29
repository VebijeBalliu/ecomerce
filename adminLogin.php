
<?php


// If user is already logged in, redirect to admin site
if(isset($_SESSION['admin_id'])) {
    header('Location: adminSite.php');
    exit;
}

include('adminServer.php');



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link rel="stylesheet" type="text/css" href="signUpDesign.css">
</head>

<body>


    
    <div class="header" >
        <h2>Login admin</h2>
     </div> 
     <form method="post" action="adminLogin.php">
     

        
            <div class="imput-group">
            <input type="text" name="username" required placeholder="enter your username" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
</div>
<div class="imput-group">
            <input type="password" name="pass" required placeholder="enter your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
</div>
<div class="imput-group">
            <input type="submit" value="login now" class="btn" name="login">
   </div>
        </form>
        <?php
if (isset($message)) {
    echo '<div class="alert alert-danger">' . $message . '</div>';
}

if (count($errors) > 0) {
    foreach ($errors as $error) {
        echo '<div class="alert alert-danger">' . $error . '</div>';
    }
}
?>




</body>

</html>
