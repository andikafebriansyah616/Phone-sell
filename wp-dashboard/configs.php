<?php 
$server = "localhost";
$username = "root";
$password = "";
$db = "db-crash";

$connect = mysqli_connect($server,$username,$password,$db);

if(!$connect){
    echo "<script>alert('Data base gagal')</script>" . mysqli_connect_error();
}

function register ($data){
    global $connect;

    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
    $image = "default.png";

    $result=mysqli_query($connect, "SELECT email FROM user WHERE email='$email'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('Email sudah terdaftar!')</script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    mysqli_query($connect,"INSERT INTO user VALUES('','$name','$email','$image','$password')");

    return mysqli_affected_rows($connect);
}

function tambahData($data){
    global $connect;
  
    $name=$data['name_phone'];
    $merk=$data['merk_phone'];
    $color=$data['color_phone'];
    $image=$_FILES['image_phone']['name'];
    $locationImage=$_FILES['image_phone']['tmp_name'];
  
    if(!empty($locationImage)){
        move_uploaded_file($locationImage , '../asset/image_phone/' . $image);
        mysqli_query($connect, "INSERT INTO phone VALUES(null ,'$name','$merk','$color','$image')");
        echo "<script>
        alert('Tambah Data berhasil!');
        window.location='http://localhost/crash/wp-dashboard/dashboardc.php'
        </script>";
    }
  
    return mysqli_affected_rows($connect);
  
  }
  



?>