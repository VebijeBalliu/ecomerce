<?php



session_start();

$fname = "";
$flastname = "";
$date = "";
$email = "";
$errors = array();
$db = mysqli_connect("localhost", "root", "", "beauté_rose");

if (isset($_POST['signup'])) {
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $flastname = mysqli_real_escape_string($db, $_POST['flastname']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);

    if (empty($fname)) {
        array_push($errors, "First Name is required");
    }
    if (empty($flastname)) {
        array_push($errors, "Last Name is required");
    }
    if (empty($date)) {
        array_push($errors, "Date is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password1)) {
        array_push($errors, "Password is required");
    }
    if (empty($password2)) {
        array_push($errors, "Password is required");
    }
    if ($password1 != $password2) {
        array_push($errors, "Passwords do not match");
    }
    if (count($errors) == 0) {
        $password=password_hash($password1,PASSWORD_DEFAULT);
        $token=bin2hex(random_bytes(50));
        $verified=false;
    
        $sql = "INSERT INTO user(FirstName,LastName,DOB,Email,verified,token,Password)
              VALUES('$fname','$flastname','$date','$email','$verified','$token','$password')";
        mysqli_query($db, $sql);
        $_SESSION['Email'] = $email;
        $_SESSION['success'] = "Logged in";
        header('location:index.php'); //homepage
    }
}

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM user WHERE Email='$email'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $hashed_password = $user['Password'];
            if (password_verify($password, $hashed_password)) {
                $_SESSION['Email'] = $email;
                $_SESSION['success'] = "Logged in";
                header('location:index.php'); //homepage
              
            } else {
                array_push($errors, "Wrong email/password");
            }
        } 
    }
}

//logout
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['CID']);
    unset($_SESSION['Email']);
    unset($_SESSION['FirstName']);
    unset($_SESSION['verified']);
    header('location:loginForm.php');
    exit();
}

/*if (isset($_POST['reset_password'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);

    if (empty($password1)) {
        array_push($errors, "Password is required");
    }
    if (empty($password2)) {
        array_push($errors, "Password is required");
    }
    if ($password1 != $password2) {
        array_push($errors, "Passwords do not match");
    }

    if (count($errors) == 0) {
        $password = md5($password1);
        $query = "UPDATE user SET Password='$password' WHERE Email='$email'";
        mysqli_query($db, $query);
        $_SESSION['success'] = "Password reset successfully.";
        header('location: loginForm.php');
    }
}*/
?>


