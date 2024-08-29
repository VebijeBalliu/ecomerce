<?php
 session_start();
 if (!isset($_SESSION['admin_id'])) {
    header('Location: adminLogin.php');
    exit;
 }
  
    include('adminProdcs.php');
    include('errors.php');
    include('adminServer.php');
  
    


    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete/Update Products</title>
    <link rel="stylesheet" type="text/css" href="signUpDesign.css">
</head>
<body>
    <div class="header">
        <h2>Update/delete Product</h2>
    </div> 
    <form method="post" action="DeleteProdcs.php">
    <?php 
        $errors = array();
        include('errors.php');?>
        
        <div class="imput-group">
            <label style="color:white">Product Name:</label>
            <input type="text" name="pname"><br><br>
        </div>
        <div class="imput-group">
            <button type="submit" name="delete" class="btn">Delete Product</button>
        </div>
    </form>
    <br>
    <hr>
    <br>
    <form method="post" action="DeleteProdcs.php" enctype="multipart/form-data">
        <input type="hidden" name="size"  value="1000000">
  
    <div class="imput-group">
            <label style="color:white">Product Name:</label>
            <input type="text" name="pname"  placeholder="Product Title" required>
        </div>
        <br>
<div >
    <label style="color:white">Product Image:</label>
    <input type="file" name="image" accept="image/*" required>
</div>

        <div class="imput-group">
            <br>
            <div class="imput-group">
                <label style="color:white">Category Id:</label>
                <select id="category_id" name="category_id" style="padding:0px" class="btn">
                    <?php 
                        $con = mysqli_connect("localhost", "root", "", "beauté_rose");
                        $sql = "SELECT * FROM category_mp";
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            // Loop through categories and add them to the dropdown menu
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['Category_ID'] . '">' . $row['Category_Name'] . '</option>';
                            }
                        } else {
                            // Handle query error
                            echo 'Error retrieving categories from database';
                        }
                    ?>
               
</select>


    </div>
    <div class="imput-group">
    <label style="color:white">Brand Name:</label>
        
        <input type="text" name="brand"  placeholder="Product Brand" required >
</div>
        <br>
        <div class="imput-group">
        <label style="color:white">Product Price:</label>
        
        <input type="number" name="price"  placeholder="Product Price" required><br>
</div>
        <br>
        <div class="imput-group">
        <label style="color:white">Product Description:</label>
        
        <textarea name="description" id="description" required></textarea>
</div>
        <br>
        <div class="imput-group">
        <label style="color:white">Date Creation:</label>
        
        <input type="date" name="date_creation" id="date_creation" required>
        <br>
        <div class="imput-group">
        <label style="color:white">Date Expiration:</label>
        
        <input type="date" name="date_expire" id="date_expire" required>
</div>
        <br>
</div>
<div class="imput-group">
    <button type="submit" name="update" class="btn">Add Product</button>
   
</div>



     </form>   
</body>
</html>