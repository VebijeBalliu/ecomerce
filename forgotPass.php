<?php 

include('dbserver.php');





?>


<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="signUpDesign.css">
</head>
<body>
<div class="header" >
    <h2>Reset Password</h2>
    

</div>
    <form method="post" action="forgotPass.php">
    <?php $errors = array();
include('errors.php');
?>

   
    <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">

        <div class="imput-group">
        <label style="color:white">New Password:</label>
        <input type="password" name="password1">
</div>
        <br>
        <div class="imput-group">
        <label style="color:white">Confirm Password:</label>
        <input type="password" name="password2">
</div>
        <br>
        <button type="submit"class="btn" name="forgot_password">Reset Password</button>
    </form>
    

</body>
</html>
