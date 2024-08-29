<?php require_once 'authController.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet"   type="text/css" href="styleWeb.css">
</head>
<body>
    
                <form action="loginWeb.php" method="post">
                    <h3 class="text-center">Login</h3>
                    <?php if(count($errors)>0):?>

<div class="imput-group">
    <?php foreach($errors as $error):?>
      <li><?php echo $error; ?></li> 
      <?php endforeach; ?>
</div>
<?php endif; ?>
<div class="imput-group">
                        <label for="email">First Name or Email</label>
                        <input type="text" name="email" class="form-control form-control-lg" value="<?php echo $email;?>">
</div>
<div class="imput-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control form-control-lg">
</div>
<div class="imput-group">
    <button type="submit" name="login-btn"  class="btn ">Sign In</button>
</div>
<p class="text-center">Not yet a member?<a href="signWeb.php">Sign up</a></p>
</form>


</body>
</html>