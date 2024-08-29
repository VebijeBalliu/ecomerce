<?php
if (session_status() == PHP_SESSION_NONE) {
   session_start();
  
   if (!isset($_SESSION['admin_id']) && basename($_SERVER['PHP_SELF']) != 'adminLogin.php') {
      header('Location: adminLogin.php');
      exit;
   }
   
}

$conn = mysqli_connect("localhost", "root", "", "beauté_rose");

// Define an empty array to hold any errors
$errors = array();

if (isset($_POST['submit'])) {
   
   // Get input values and sanitize them
   $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $cpass = sha1($_POST['cpass']);

   // Check if username already exists
   $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE Username = ?");
   $select_admin->bind_param("s", $username); // use bind_param to bind the parameter to the prepared statement
   $select_admin->execute();
   $result = $select_admin->get_result();

   if($result->num_rows > 0){
      array_push($errors, "Username already exists!");
   } else {
      // Insert new admin into database
      $insert_admin = $conn->prepare("INSERT INTO `admin`(Username, Password) VALUES (?,?)");
      $insert_admin->bind_param("ss", $username, $cpass); // use bind_param to bind parameters to the prepared statement
      $insert_admin->execute();
      $message = "New admin registered successfully!";
      array_push($errors, $message);
   }
  
   
}

if (isset($_POST['login'])) {
   // Validate username and password
   $username = $_POST['username'];
   $pass = $_POST['pass'];
   $stmt = $conn->prepare("SELECT * FROM admin WHERE Username = ? AND Password = ?");
   $hashed_pass = sha1($pass);
   $stmt->bind_param("ss", $username, $hashed_pass);
   
   $stmt->execute();
   $result = $stmt->get_result();
   if ($result->num_rows === 1) {
       // Authenticate user and set session variable
       $_SESSION['admin_id'] = 1;
       // Redirect to admin site
       header('Location: adminSite.php');
       exit;
   } else {
       // Invalid login credentials
       array_push($errors, "Invalid username or password");
   }
   if (!isset($_SESSION['admin_id'])) {
      header('Location: adminLogin.php');
      exit;
   }
   
}


/*if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['admin_id']);
   header('location: adminLogin.php');
   exit;
}*/

?>
