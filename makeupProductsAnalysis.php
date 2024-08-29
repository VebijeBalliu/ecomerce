<?php
session_start();

// If user is not logged in, redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header('Location: adminLogin.php');
    exit;
}

$con = mysqli_connect("localhost", "root", "", "beauté_rose");
include('adminProdcs.php');
if($con){
  echo"Connected";
}
?>

<html>
  <head>
  <title>Beauté Rose</title>
  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
    
 
   

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
     var xmlhttp = new XMLHttpRequest();//krijojm instance te objektit 'XMLHttpRequest'
     xmlhttp.open("GET", "data.json", true);//hapim lidhjen me server dhe specifikojm tipin GET(ose POST) dhe me url e file
     xmlttp.onreadystatechange = function() {
     if (xmlttp.readyState === 4 && xmlttp.status === 200) {//readystate->statusi i request nqs 4  dhe status 200 request complete dhe succesful
     var data = JSON.parse(xmlttp.responseText);//parse text as JSON
     drawChart(data);
  }
};
xhr.send();

           function drawChart() {                                                                                

        var data = google.visualization.arrayToDataTable([
          ['Category_Name', 'NUMRI I Produkteve sipas kategorive'],
          <?php
          $sql = "SELECT category_mp.Category_Name,COUNT(*) as 'Numri I Produkteve sipas kategorive'
          FROM product_mp 
          INNER JOIN category_mp  ON product_mp.Category_ID=category_mp.Category_ID
          GROUP BY category_mp.Category_Name";
          
          
           $result=mysqli_query($con,$sql);//koleksion rreshtash qe jane kthyer nga query
          if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
              echo "['".$row["Category_Name"]."',".$row["Numri I Produkteve sipas kategorive"]."],";
              
          }
        }
           
           ?>


          
        ]);

        var options = {
          title: 'Numri I Produkteve sipas kategorive'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      
    </script>
    
  </head>
  <body style="background-color:#ffe5ec">   
    <h2>Beauté Rose</h2>
    
   
        
 
     
    <div id="piechart" style="width: 900px; height: 500px;"></div>
     
    <?php if(isset($_SESSION['success'])):?>
        
        <h3>
            <?php 
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </h3>

    <?php endif ?>
    <?php if(isset($_SESSION["pname"])): ?>
    <p>Added <?php echo $_SESSION['pname']?></p>
    <a href="DeleteProdcs.php">Delete Product</a>
    <a href="DeleteProdcs.php">Update Product</a>
    <a href="InsertProdcs.php">Insert Product</a>
    <?php endif ?>
  </body>
</html>
