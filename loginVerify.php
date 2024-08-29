<!DOCTYPE html>
<html>
<head>
  <title>Login Verification</title>
  <link rel="stylesheet" type="text/css" href="signUpDesign.css">
  <style>
    .container {
      text-align: center;
      margin-top: 150px;
    }
   
    .icon {
      display: inline-block;
      width: 50px;
      height: 50px;
      margin-right: 10px;
      vertical-align: middle;
      transition: transform 0.3s; /* Add transition for hover effect */
    }
    
    .btn-container {
      display: flex;
      justify-content: center;
    }
    
    .btn {
      display: inline-block;
      padding: 10px 40px; /* Adjust the padding to make the buttons more extensive */
      margin: 10px;
    }
    
    .icon:hover {
      transform: scale(1.2); /* Increase the size of the icon on hover */
      cursor: pointer; /* Change the cursor to a pointer on hover */
    }
  </style>
</head>
<body>
    
  <div class="header">
    <h1>Login Verification</h1>
  </div>
    
  <form>
    <br>
    <div class="btn-container">
    <button class="btn">
      <a style="color:white" href="adminLogin.php">Log in as admin</a>
      <img src="administration-icon.png" alt="Admin" class="icon" onclick="window.location.href='adminLogin.php';">
    </button>
    <br>
    <br>
    <br>
    <br>
    <button class="btn">
      <a style="color:white" href="loginForm.php">Log in as user</a>
      <img src="avatarLogin.png" alt="User" class="icon" onclick="window.location.href='loginForm.php';">
    </button>
</div>
  </form>
 
</body>
</html>



