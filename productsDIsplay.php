<?php
session_start(); // start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauté_rose";

$con = new mysqli($servername, $username, $password, $dbname);

// check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}




$status = "";
if (isset($_POST['Product_ID']) && $_POST['Product_ID'] != "") {
    $Product_ID = $_POST['Product_ID'];
    $result = mysqli_query(
        $con,
        "SELECT * FROM `product_mp` WHERE `Product_ID`='$Product_ID'"
    );
    $row = mysqli_fetch_assoc($result);
    $Product_Name = $row['Product_Name'];
    $Product_ID = $row['Product_ID'];
    $Price = $row['Price'];
    $Image = $row['Image'];

    $cartArray = array(
        $Product_ID => array(
            'Product_Name' => $Product_Name,
            'Product_ID' => $Product_ID,
            'Price' => $Price,
            'quantity' => 1,
            'Image' => $Image
        )
    );

    if (empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        $status = "<div class='box'>Product is added to your cart!</div>";
    } else {
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if (in_array($Product_ID, $array_keys)) {
            $status = "<div class='box' style='color:red;'>
            Product is already added to your cart!</div>";
        } else {
            $_SESSION["shopping_cart"] = array_merge(
                $_SESSION["shopping_cart"],
                $cartArray
            );
            $status = "<div class='box'>Product is added to your cart!</div>";
        }
    }
}

?>

<?php

if (!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
    <div class="cart_div">
        <a href="shoppingCart.php"><img src="cart.jpg" /> Product on Cart<span>
                <?php echo $cart_count; ?></span></a>
    </div>
<?php
}
?>
  <header>
   
<div class="navbar" style="background: #ff0a54">
  <div class="logo">
    <a href="wepPage.php" style=color:#fb6f92;;>Beauté Rose</a>
  </div>
  <ul class="menu">
    <li><a href="wepPage.php">Home</a></li>
    <li class="dropdown">
      <a href="productsDIsplay.php">Categories</a>
      <ul>
        <li><a href="lipsPage.php">Lips</a></li>
        <li><a href="facePage.php">Face</a></li>
        <li><a href="eyesPage.php">Eyes</a></li>
      </ul>
    </li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>
  </ul>
</div>


<div class="product_container">
    <?php
    $result = mysqli_query($con, "SELECT * FROM `product_mp`");
    while ($row = mysqli_fetch_assoc($result)) {
        $category = $row['Category_ID'];
        $folder = '';
        if ($category == '2') {
            $folder = 'productsImgs/';
        } else if ($category == '3') {
            $folder = 'productsImgs/';
        } else if ($category == '1') {
            $folder = 'productsImgs/';
        }

        echo "<div class='product_wrapper'>
            <form method='post' action=''>
                <input type='hidden' name='Product_ID' value='" . $row['Product_ID'] . "' />
                <div class='Image'><img src='" . $folder . $row['Image'] . "' /></div>
                <div class='Product_Name'>" . $row['Product_Name'] . "</div>
                <div class='Price'>$" . $row['Price'] . "</div>
                <button type='submit' class='buy'>Add to Cart</button>
            </form>
        </div>";
    }
    mysqli_close($con);
    ?>
</div>
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
    <?php echo $status; ?>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beauté Rose</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" />
      
        
      
        <style>
            body {
  height: 100vh;
  width: 100%;
  display: flex;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  margin: 0;
  padding: 0;
  height: 100%;
  overflow: auto;
  background: #ffe5ec;
}
.navbar {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 80px;

  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
  padding: 0 50px;
}
.navbar .logo {
  font-size: 30px;
}

header .navbar {
    max-width: 2000px;
    margin: 0 auto;
    padding: 50px 100px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 9999;
}

@media (max-width:850px) {
  header .navbar {
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 15px 5px;
  }

  .navbar .menu {
    margin: 10px 0 20px 0;
  }

  header .text-content {
    margin: 30px 0 0 20px;
    width: 70%;
  }

  header .text-content h2 {
    font-size: 20px;
  }
}


.navbar .menu {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 0 20px;
}


.navbar .menu .dropdown {
  position: relative;
}

.navbar .menu .dropdown>a:after {
  content: "\25BE";
  margin-left: 5px;
}

.navbar .menu .dropdown ul {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background-color: #fff;
  border-radius: 5px;
  padding: 10px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
}

.navbar .menu .dropdown:hover ul {
  display: block;
}

.navbar .menu .dropdown ul li {
  display: block;
  margin: 5px 0;
}
.navbar .menu a {
  color: whitesmoke;
  text-decoration: none;
  font-size: 25px;
  font-style: bold;
  font-weight: 500;
  transition: all 0.3s ease;
  padding: 10px;
}

.navbar .menu li {
  list-style-type: none;
}

.navbar .menu ul li {
  margin: 5px 0;
}

.navbar .menu .dropdown ul li a {
  color: #000;
  font-size: 14px;
  font-weight: 400;
  text-decoration: none;
  display: block;
  padding: 5px 10px;
  list-style-type: none;
}

.navbar .menu .dropdown ul {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background-color: #fff;
  border-radius: 5px;
  padding: 20px; /* Increase the padding to make the dropdown wider */
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
}


.navbar .menu .dropdown ul li {
  display: block;
}

.navbar .menu .dropdown ul li a:hover {
  color: #f2f2f2;
  background-color: #fb6f92;
  display: block;
  list-style-type: none;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.product_wrapper {
    display: inline-block;
    width: 300px;
    margin: 20px;
    text-align: center;
}

.product_wrapper img {
    max-width: 100%;
    height: auto;
}

.product_wrapper .Product_Name {
    font-size: 1.2em;
    margin: 10px 0;
}

.product_wrapper .Price {
    font-size: 1.2em;
    color: #f44336;
    font-weight: bold;
    margin-bottom: 10px;
}

.product_wrapper .buy {
    background-color: #ff0a54;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

.product_wrapper .buy:hover {
    background-color: #ff6666;
}
.product_wrapper img {
    max-width: 100%;
    height: auto;
    border: 2px solid #ccc;
    padding: 5px;
}


        </style>
        
    </head>
    <body>
   
   
     <div class="content"  style="width: 30%; margin: 0px auto; padding: 20px; border: 1px solid #ffb3c6; background: white; border-radius: 0px 0px 10px 10px;">
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
            <button class="btn"><a href="index.php?logout='1'">Log Out</a></button>
           </body>
           </html>
           <?php
            else:
                header("Location: productsDIsplay.php");
                exit();
            endif;
           ?> 

