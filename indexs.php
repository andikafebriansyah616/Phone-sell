<?php 

require_once('wp-dashboard/configs.php');



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./asset/css/stylesheet.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="wp-dashboard/dashboardc.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="indexs.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="wp-dashboard/logins.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="wp-dashboard/registers.php">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<div class="title-list mt-5 text-center">HOME
</div>
</div>




<div class="container">

<div class="col-lg-12">

 <?php
 
 require_once('wp-dashboard/configs.php');
  $data = mysqli_query($connect , "SELECT * FROM phone");

 while($phone=mysqli_fetch_array($data)) {


 ?>


 <div class="col-lg-4 phone-image">
 <p><?php echo $phone['name_phone'] ?></p>
    <img src="./asset/image_phone/<?php echo $phone['image_phone']?>" style="width:150px" alt="">

 </div>



 <?php  } ?>

</div>

</div>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
</body>
</html>