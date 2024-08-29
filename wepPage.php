<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>BEAUTÉ ROSE</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="styleee.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

html {
  height: 100%;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
  transition: all 0.3s ease;
}

body {
  height: 100vh;
  width: 100%;
  display: flex;
  background-image: linear-gradient(135deg, #ff9a9e 10%, #F6416C 100%);
  background-image: url('ami.jpg');
  
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
    margin: 0;
    padding-bottom: 100px; /* Adjust the padding value to match the height of the footer */
  
  min-height: 100vh;
  overflow-y: auto;
  margin: 0;
  padding-bottom: 100px; /* Adjust the padding value to match the height of the footer */
}
body::before {
    clip-path: circle(30% at left 20%);
    opacity: 0.4;
    background-image: linear-gradient(135deg, #F6416C 10%, #ff9a9e 100%);
}
body::before, body::after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
}
.image {
  background-image: url('image.jpg');
  width: 500px;
  height: 400px;
  /* Add other CSS styles as needed */
}
::selection {
  color: #f2f2f2;
  background: #f86d8d;
}


header .navbar {
  max-width: 1200px;
  margin: 0 auto;
  padding: 50px 100px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  z-index: 9999;
}

.navbar .menu {
  display: flex;
  flex-wrap: wrap;
}
.navbar .logo {
  font-size: 30px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 2px;
  color: #333;
}

.navbar .menu li {
  list-style: none;
  margin: 0 6px;
}

.navbar .menu a {
  color: #fb6f92;
  text-decoration: none;
  font-size: 25px;
  font-style: bold;
  font-weight: 500;
  transition: all 0.3s ease;
}

.navbar .menu a:hover {
  color: #fb6f92;
}

.navbar .buttons input {
  outline: none;
  color: #f2f2f2;
  font-size: 18px;
  font-weight: 500;
  border-radius: 12px;
  padding: 6px 15px;
  border: none;
  margin: 0 8px;
  cursor: pointer;
  transition: all 0.3s ease;
  background-image: linear-gradient(135deg, #ff9a9e 10%, #F6416C 100%);
}

.navbar .buttons input:hover {
  transform: scale(0.97);
  
}


header .play-button {
  position: absolute;
  right: 50px;
  bottom: 40px;
}

.play-button .play {
  font-size: 18px;
  font-weight: 500;
}

.play-button .play::before {
  content: '';
  position: absolute;
  height: 3px;
  width: 50px;
  top: 50%;
  transform: translateY(-50%);
  left: -58px;
  background: #000;
}

.play-button i {
  height: 40px;
  width: 40px;
  border: 2px solid #000;
  line-height: 38px;
  text-align: center;
  margin-left: 10px;
  border-radius: 6px;
  cursor: pointer;
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

}

@media (max-width:410px) {
  header {
    height: 100vh;
    width: 100%;
    border-radius: 0px;
  }

  header .navbar {
    padding: 15px 10px;
  }
}

.error {
  width: 92%;
  margin: 0px auto;
  padding: 10px;
  border: 1px solid #a94442;
  color: #a94442;
  background: #f2dede;
  border-radius: 5px;
  text-align: left;
}



.navbar {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 80px;

  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
  padding: 0 50px;
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

.navbar .menu .dropdown ul li a {
  color: #000;
  font-size: 14px;
  font-weight: 400;
  text-decoration: none;
  display: block;
  padding: 5px 10px;
}

.navbar .menu .dropdown ul li a:hover {
  color: #f2f2f2;
  background-color: #fb6f92;
  display: block;
}

.navbar .menu ul {
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s, opacity 0.5s ease;
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  z-index: 999;
  background: #fff;
  border-radius: 25px;
  padding: 10px 0;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.navbar .menu:hover ul {
  visibility: visible;
  opacity: 1;
  transition-delay: 0.2s;
}
  .footer {
    
      white-space: nowrap;
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 20px 40px;
      background-color: #f1f1f1;
      font-size: 14px;
      color: #333;

    }
    .pink-icon {
  color: #fb6f92;
  background-color:pink;
  border: 1px solid #fb6f92;
  border-radius: 5px;
  padding: 5px;
}

  </style>
  <header>

<body>
  <div class="navbar">
    <div class="logo">
      <a href="wepPage.php" style="color:#fb6f92;">Beauté Rose</a>
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
      <li><a href="about.php">About</a></li>
      
    </ul>
    <div class="search-container">
      <a href="search.php">
        <i class="fas fa-search  pink-icon"></i>
      </a>
    </div>
    <div class="buttons">
  <input type="button" value="Login" onclick="location.href='loginVerify.php';">
        <input type="button" value="SignUp" onclick="location.href='SignUpForm.php';">
  </div>
  <a href="productsDIsplay.php">
    <div class="image"></div>
  </a>
  
</div>
    
  </div>
  

  
    
  </header>
  <footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>About Us</h3>
        <p>We are a beauty company .</p>
      </div>
      <div class="col-md-6">
        <h3>Contact Us</h3>
        <ul>
          <li>Address: 123 Main St, Anytown USA</li>
          <li>Phone: 555-555-5555</li>
          <li>Email: info@beauterose.com</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 scrollable">
        <p>&copy; 2023 Beauté Rose. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>

</body>

</html>