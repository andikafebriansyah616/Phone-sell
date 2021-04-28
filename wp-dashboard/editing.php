<?php 
require_once('configs.php');
session_start();

if($_SESSION['status'] != "login"){
    header('location:indexs.php');
}

$data=mysqli_query($connect, "SELECT * FROM phone WHERE id='$_GET[id]'");
$phone=$data->fetch_assoc();

if(isset($_POST['update_phone'])){
    $name=$_POST['name_phone'];
    $merk=$_POST['merk_phone'];
    $color=$_POST['color_phone'];
    $image=$_FILES['image_phone']['name'];
    $locationImage=$_FILES['image_phone']['tmp_name'];

    if(!empty($locationImage)){
        move_uploaded_file($locationImage, '../asset/image_phone/' . $image);
        mysqli_query($connect, "UPDATE phone SET name_phone='$name', merk_phone='$merk', color_phone='$color' , image_phone='$image' WHERE id='$_GET[id]'");
    }else{
        mysqli_query($connect, "UPDATE phone SET name_phone='$name', merk_phone='$merk', color_phone='$color' WHERE id='$_GET[id]'");
    }
    echo "<script>alert('Data berhasil di update!');
    window.location='http://localhost/crash/wp-dashboard/dashboardc.php'
    </script>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboardc.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../indexs.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logouts.php">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registers.php">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<div class="Section-title mt-5 text-center">Edit
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah data
</button> -->
<div class="title-list">
<form method="POST" enctype="multipart/form-data">
  <div class="form-group text-center">
    <label for="exampleInputEmail1">Name Phone</label>
    <input type="text" name="name_phone" required value="<?php echo $phone['name_phone'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Merk Phone</label>
    <input type="text" name="merk_phone" required value="<?php echo $phone['merk_phone'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Color Phone</label>
    <input type="text" name="color_phone" required value="<?php echo $phone['color_phone'] ?>" class="form-control">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Image Phone</label>
    <img src="../asset/image_phone/<?php echo $phone['image_phone'] ?>" style="width:50px"alt="">
    <input type="file" name="image_phone" class="form-control-file" id="exampleFormControlFile1">
  </div>
  <div class="modal-footer">
        <a href='./dashboardc.php' class="btn btn-secondary" data-dismiss="modal">Back</a>
        <button type="submit" name="update_phone" class="btn btn-primary">Update</button>
      </div>
</form>
</div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
</body>
</html>
