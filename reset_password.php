<?php
include("dbserver.php");

if(isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Check if email exists in the database
    $query = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    if($user) {
        // Generate a random password
        $new_password = generateRandomPassword();

        // Update user's password in the database
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $query = "UPDATE user SET password='$hashed_password' WHERE email='$email'";
        mysqli_query($db, $query);

        // Display the new password to the user
        echo "Your password has been reset to: $new_password";
    } else {
        // Email not found in the database
        echo "Email not found";
    }
}

// Function to generate a random password
function generateRandomPassword($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your data reset</title>
</head>
<body>
  
    <p><a href="loginForm.php">Login</a></p>
</body>
</html>