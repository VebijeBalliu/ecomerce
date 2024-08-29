<?php


// Connect to database
$con = mysqli_connect("localhost", "root", "", "beauté_rose");

// Check for errors
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search Page</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styleee.css">

   <style>
       /* Search Form */
       .search-form {
           display: flex;
           justify-content: center;
           align-items: center;
           margin-top: 50px;
       }

       .search-form form {
           position: relative;
       }

       .search-form input[type="text"] {
           width: 400px;
           padding: 15px;
           border-radius: 30px;
           border: none;
           font-size: 16px;
           background-color: #f7f7f7;
           color: #444;
       }

       .search-form input[type="text"]::placeholder {
           color: #999;
       }

       .search-form button[type="submit"] {
           position: absolute;
           top: 50%;
           right: 5%;
           transform: translateY(-50%);
           width: 50px;
           height: 50px;
           border-radius: 50%;
           border: none;
           font-size: 24px;
           color: #fff;
           background-color: #ff69b4;
       }

       .search-form button[type="submit"]:hover {
           cursor: pointer;
           opacity: 0.8;
       }
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
   </style>
</head>
<body>
<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search_box" placeholder="Search here..." maxlength="100" class="box" required>
      <button type="submit" class="fas fa-search" name="search_btn"></button>
   </form>
</section>

<section class="product_mp" style="padding-top: 0; min-height:100vh;">
   <div class="box-container">
   <?php
     if(isset($_POST['search_box']) || isset($_POST['search_btn'])){
        $search_box = $_POST['search_box'];
        $keyword = "%$search_box%"; // Add wildcard characters

        $select_product_mp = $con->prepare("SELECT * FROM `product_mp` WHERE Brand LIKE ?");
        $select_product_mp->bind_param("s", $keyword);
        $select_product_mp->execute();

        $result = $select_product_mp->get_result();

        if ($result->num_rows > 0) {
            while ($fetch_product = $result->fetch_assoc()) {
                ?>
                <form action="productsDIsplay.php" method="post" class="box">
                    <input type="hidden" name="Product_ID" value="<?= $fetch_product['Product_ID']; ?>">
                    <input type="hidden" name="Product_Name" value="<?= $fetch_product['Brand']; ?>">
                    <input type="hidden" name="Price" value="<?= $fetch_product['Price']; ?>">
                    <input type="hidden" name="Image" value="<?= $fetch_product['Image']; ?>">
                    
                    <img src="./productsImgs/<?= $fetch_product['Image']; ?>" alt="">

                    <div class="name"><?= $fetch_product['Brand']; ?></div>
                    <div class="flex">
                        <div class="Price"><span>$</span><?= $fetch_product['Price']; ?><span>/-</span></div>
                        
                    </div>
                    <input type="submit" class="btn" value="Add to Cart" class="btn" name="add_to_cart">
                </form>
                <?php
            }
        } else {
            echo '<p class="empty">No products found!</p>';
        }
    }
   ?>
   </div>
</section>

<script src="js/script.js"></script>

</body>
</html>