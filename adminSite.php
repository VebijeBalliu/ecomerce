<?php

  session_start();
if (!isset($_SESSION['admin_id'])) {
   header('Location: adminLogin.php');
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
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="signUpDesign.css">
</head>
<body>
    
<div class="header">
<h1 style="position:centre",style="color:#f08080">Welcome Admin!</h1>

        <h2 style="position:centre",style="color:#f08080">Menage Details</h2>
    </div> 
    <div class="content" > 
    
       
        
    <button class="btn"><a style="color:white" href="InsertProdcs.php">Insert new prodcuts</a></button><br>
    <br>
            <button class="btn"><a style="color:white" href="DeleteProdcs.php">Delete/Modify products</a></button><br>
            <br>
            <button class="btn"><a style="color:white" href="makeupProductsAnalysis.php">Check products analytics</a></button><br>
            <br>
            <button class="btn"><a style="color:white" name="logout" href="adminLogin.php">Log Out</a></button><br>
            <br>
            <button class="btn"><a style="color:white" href="adminSignUp.php">Sign Up</a></button><br>
            <br>
            <button class="btn"><a style="color:white" href="wepPage.php">Go to homepage</a></button>
</div>

</body>
</html>
