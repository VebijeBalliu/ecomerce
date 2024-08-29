<?php 
include('dbserver.php');



?>




<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beauté Rose</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="signUpDesign.css">
        
    </head>
    <body>
        
     <div class="header" >
        <h2>Beauté Rose</h2>
     </div>  
     <div class="content">
    <?php if(isset($_SESSION['success'])):?>
        <div class="error success">
            <h3>
                <?php 
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <?php if(isset($_SESSION["Email"])): ?>
        <p>Welcome <?php echo $_SESSION['Email']?></p>
        <button class="btn"><a style="color:white" href="index.php?logout='1'">Log Out</a></button>
        <button class="btn"><a style="color:white" href="wepPage.php">Go to homepage</a></button>

        <?php if(isset($_SESSION['Email']) && !empty($_SESSION['Email'])): ?>
        <button class="btn"><a style="color:white" href="shoppingCart.php">View Shopping Cart</a></button>
        <button class="btn"><a style="color:white" href="checkout.php">Checkout</a></button>
    <?php endif ?>
    <!-- End of redirection section -->





    <?php endif ?>
</div>


    </body>
    </html>