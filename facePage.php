<?php
session_start();

include('orderServer.php');
$con = mysqli_connect("localhost", "root", "", "beauté_rose");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$category_id = 3;
$category_query = mysqli_query($con, "SELECT Category_Name FROM category_mp WHERE Category_ID = $category_id");

if (!$category_query) {
    echo "Error: " . mysqli_error($con);
    exit();
}

$category = mysqli_fetch_assoc($category_query)['Category_Name'];

$products_query = mysqli_query($con, "SELECT Product_ID, Product_Name, Price, Description, Image, Brand, Date_Expire, Date_Creation FROM product_mp WHERE Category_ID = $category_id");

if (!$products_query) {
    echo "Error: " . mysqli_error($con);
    exit();
}

if (isset($_POST['add_to_cart']) && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Check if the product is already in the cart
    if (isset($_SESSION["shopping_cart"][$product_id])) {
        // If yes, increment its quantity
        $_SESSION["shopping_cart"][$product_id]['quantity']++;
    } else {
        // If no, add the product to the cart
        $product_query = mysqli_query($con, "SELECT Product_ID, Product_Name, Price, Image FROM product_mp WHERE Product_ID = $product_id");

        if (!$product_query) {
            echo "Error: " . mysqli_error($con);
            exit();
        }

        $product = mysqli_fetch_assoc($product_query);

        $_SESSION["shopping_cart"][$product_id] = array(
            'Product_Name' => $product['Product_Name'],
            'Product_ID' => $product['Product_ID'], // Include Product_ID
            'Price' => $product['Price'],
            'quantity' => 1,
            'Image' => $product['Image']
        );
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $category; ?></title>
    <link rel="stylesheet" href="categoryStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            align-items: right;
            font-size: 100%;
            background: #ffe5ec;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 20px;
            margin-bottom: 20vh;
            position: relative;
        }

        .product {
            border: 1px solid black;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            background: white;
            max-width: 300px;
            height: auto;
            z-index: 1;
        }

        .product img {
            position: relative;
            display: block;
            width: 85%;
            height: auto;
        }

        .btn {
            font-size: 15px;
            background: #ff0a54;
            color: white;
            border: 2px solid;
            border-radius: 5px;
            padding: 10px;
            font-size: 1em;
            transition: all 0.25s;
        }

        .btn:hover {
            border-color: #FFE5EC;
            color: white;
            box-shadow: 0 0.5em 0.5em -0.4em #FFE5EC;
            transform: translateY(-0.25em);
        }

        .navbar {
            background-color: #ff0a54;
            padding: 1em;
        }

        .navbar a {
            color: pink;
            text-decoration: none;
            margin: 0 1em;
            font-size: 1.2em;
            transition: color 0.3s;
        }

        .navbar a:hover {
            color: #ffe5ec;
        }

        .cart_div {
            float: right;
            margin-right: 20px;
        }

        .cart_div a {
            color: white;
            text-decoration: none;
            font-size: 1.2em;
        }

        .cart_div a:hover {
            color: pink;
        }
    </style>
</head>
<body>
<header>
    <div class="cart_div">
        <a href="shoppingCart.php"><img src="cart.jpg" /> Product on Cart<span>
                <?php
                if (!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    echo $cart_count;
                } else {
                    echo '0';
                }
                ?>
            </span>
        </a>
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
    
    <li><a href="#">Contact</a></li>
  </ul>
</div>
    </div>
    <!-- Your header content here -->
</header>
<h1><?php echo $category; ?></h1>
<div class="container">
    <?php
    while ($product = mysqli_fetch_assoc($products_query)) {
        ?>
        <div class="product">
            <?php if (!empty($product['Image'])): ?>
                <img src="./face/<?php echo $product['Image']; ?>" alt="<?php echo $product['Product_Name']; ?>">
            <?php endif; ?>
            <h2><?php echo $product['Product_Name']; ?></h2>
            <p><?php echo $product['Brand']; ?></p>
            <p><?php echo "$" . $product['Price']; ?></p>
            <p><?php echo $product['Description']; ?></p>
            <form action="facePage.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product['Product_ID']; ?>">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </div>
        <?php
    }
    ?>
</div>
<footer class="footer">
    <!-- Your footer content here -->
</footer>
</body>
</html>
