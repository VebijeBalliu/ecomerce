<?php
// Connect to database
$con = mysqli_connect("localhost", "root", "", "beauté_rose");
include('adminProdcs.php');
// Check for errors
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Define the category ID for Eyes
$category_id = 2;

// Get the category name
$category_query = mysqli_query($con, "SELECT Category_Name FROM category_mp WHERE Category_ID = $category_id");

// Check if the query was successful
if (!$category_query) {
    echo "Error: " . mysqli_error($con);
    exit();
}

$category = mysqli_fetch_assoc($category_query)['Category_Name'];

// Get products for the selected category
$products_query = mysqli_query($con, "SELECT Product_Name, Price, Description, Image, Brand, Date_Expire, Date_Creation FROM product_mp WHERE Category_ID = $category_id");


// Check if the query was successful
if (!$products_query) {
    echo "Error: " . mysqli_error($con);
    exit();
}

// Check if any products were found
if (mysqli_num_rows($products_query) > 0) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $category; ?></title>
    <style>
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 20px;
        }

        .product {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        .product-image {
            width: 100%;
            height: auto;
            transition: transform 0.5s;
        }

        .product-image:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <h1><?php echo $category; ?></h1>
    <div class="container">
      <?php
    // Loop through products and display them in product divs
while ($product = mysqli_fetch_assoc($products_query)) {
    ?>
    <div class="product">
        
        <?php if (!empty($product['Image'])): ?>
            <img src="<?php echo $product['Image']; ?>" alt="<?php echo $product['Product_Name']; ?>">
        <?php else: ?>
            <img src="C:\xampp\htdocs\ProjektiWebProgramim\productsImgs\eye" alt="Default Image">
        <?php endif; ?>
        <h2><?php echo $product['Product_Name']; ?></h2>
        <p><?php echo $product['Price']; ?></p>
        <p><?php echo $product['Description']; ?></p>
        <a href="checkout.php?product_id=<?php echo $product['Product_ID']; ?>">Shop Now</a>
    </div>
    <?php
}
}
?>

