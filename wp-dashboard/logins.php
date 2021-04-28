<?php 

require_once("configs.php");

if(isset($_POST['login'])){

    $email=$_POST['email'];
    $password=$_POST['password'];

    $result = mysqli_query($connect,"SELECT * FROM user WHERE email='$email'");

    if(mysqli_num_rows($result) === 1 ) {

        $data=mysqli_fetch_assoc($result);

        if(password_verify($password,$data["password"])){
            session_start();
            $_SESSION['email']=$email;
            $_SESSION['status']="login";
            header('location:dashboardc.php');
            exit;
        }else{
            echo "<script>alert('Email atau password salah!')</script>";
        }
    }
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

<nav class="navbar navbar-expand-lg navbar-light bg-danger">
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
          <a class="nav-link" href="logins.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registers.php">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<div class="title-list mt-5 text-center">
<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" required class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="login" class="btn btn-primary">Submit</button>
</form>
</div>
</div>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
</body>
</html>