<?php
if (session_status() == PHP_SESSION_NONE) {
if (!isset($_SESSION['admin_id']) && basename($_SERVER['PHP_SELF']) != 'adminLogin.php') {
   header('Location: adminLogin.php');
   exit;
}
}



$product_id = "";
$category_id = "";
$pname ="" ;
$brand = "";
$price = "";
$description ="";
$date_creation ="";
$date_expire = "";
$image = "";

$errors = array();
$db = mysqli_connect("localhost", "root", "", "beauté_rose");

if (isset($_POST['submit'])) {
    // Retrieve input values and sanitize them
    
    $category_id = mysqli_real_escape_string($db, $_POST['category_id']);
    $pname = mysqli_real_escape_string($db, $_POST['pname']);
    $brand = mysqli_real_escape_string($db, $_POST['brand']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $date_creation = mysqli_real_escape_string($db, $_POST['date_creation']);
    $date_expire = mysqli_real_escape_string($db, $_POST['date_expire']);

    // Validate input values
   
    if (empty($category_id)) {
        array_push($errors, "Category ID is required");
    }
    if (empty($pname)) {
        array_push($errors, "Product Name is required");
    }
    if (empty($brand)) {
        array_push($errors, "Brand is required");
    }
    if (empty($price)) {
        array_push($errors, "Price is required");
    }
    if (empty($description)) {
        array_push($errors, "Description is required");
    }
    if (empty($date_creation)) {
        array_push($errors, "Date Creation is required");
    }
    if (empty($date_expire)) {
        array_push($errors, "Date Expire is required");
    }
    if (empty($_FILES['image']['name'])) {
        array_push($errors, "Image is required");
    }

    // If there are no errors, insert the product into the database
    if (count($errors) == 0) {
        $target = "images/" . basename($image);
        $image = $_FILES['image']['name'];
        
        
            $query = "INSERT INTO product_mp (Product_ID, Category_ID, Product_Name, Brand, Price, Description, Date_Creation, Date_Expire, Image)
                      VALUES ('$product_id', '$category_id', '$pname', '$brand', '$price', '$description', '$date_creation', '$date_expire', '$image')";
            mysqli_query($db, $query);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Upload successfully";
            } else {
                $msg = "Image upload failed";
            }
            $_SESSION['pname'] = $pname;
            $_SESSION['success'] = "Product added successfully.";
            header('location: makeupProductsAnalysis.php');
            exit();
       
    } else {
        $_SESSION['error'] = "Error adding product: " . mysqli_error($db);
    }
}

if (isset($_POST['update']) && isset($_POST['product_id'])) {
    // Retrieve input values and sanitize them
    
    $category_id = mysqli_real_escape_string($db, $_POST['category_id']);
    $pname = mysqli_real_escape_string($db, $_POST['pname']);
    $brand = mysqli_real_escape_string($db, $_POST['brand']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $date_creation = mysqli_real_escape_string($db, $_POST['date_creation']);
    $date_expire = mysqli_real_escape_string($db, $_POST['date_expire']);
    $image = mysqli_real_escape_string($db, $_FILES['image']['name']);
    // Validate input values
   
    if (empty($category_id)) {
        array_push($errors, "Category ID is required");
    }
    if (empty($pname)) {
        array_push($errors, "Product Name is required");
    }
    if (empty($brand)) {
        array_push($errors, "Brand is required");
    }
    if (empty($price)) {
        array_push($errors, "Price is required");
    }
    if (empty($description)) {
        array_push($errors, "Description is required");
    }
    if (empty($date_creation)) {
        array_push($errors, "Date Creation is required");
    }
    if (empty($date_expire)) {
        array_push($errors, "Date Expire is required");
    }
    if (empty($image)) {
        array_push($errors, "Image is required");
    }
    $msg = "";
    // If there are no errors, update the product in the database
    if (count($errors) == 0) {
        //the path to store the uploaded image
        $target = "images/" . basename($_FILES['image']['name']);
        //get all the submitted data from the form
        $image = $_FILES['image']['name'];
        $query = "UPDATE product_mp SET Category_ID='$category_id', Product_Name='$pname', Brand='$brand', Price='$price', Description='$description', Date_Creation='$date_creation', Date_Expire='$date_expire', Image='$image' WHERE Product_ID='$product_id'";
        mysqli_query($db, $query);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Upload successfully";
        } else {
            $msg = "Image upload failed";
        }
    $_SESSION['pname'] = $pname;
    $_SESSION['success'] = "Product updated successfully.";
    header('location: makeupProductsAnalysis.php');
    exit();
   

} else {
    $_SESSION['error'] = "Error updating product: " . mysqli_error($db);
}
}
// Check if the delete button was clicked and if a product name was provided
if (isset($_POST['delete']) && isset($_POST['pname'])) {
    
    $pname = $_POST['pname'];
    // Connect to the database
    $con = mysqli_connect("localhost", "root", "", "beauté_rose");
    // Delete the product from the database
    $sql = "DELETE FROM product_mp WHERE Product_Name = '$pname'";

    $result = mysqli_query($con, $sql);
    // Check if any rows were affected by the delete query
    if (mysqli_affected_rows($con) > 0) {
        echo "Product deleted successfully";
    } else {
        echo "Invalid product name. No product was deleted.";
    }

}



?>
