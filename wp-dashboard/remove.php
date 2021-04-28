<?php 

require_once('configs.php');

session_start();

if($_SESSION['status'] == "login"){
    $data=mysqli_query($connect , "SELECT * FROM phone WHERE id='$_GET[id]'");
    $phone=$data->fetch_assoc();

    mysqli_query($connect, "DELETE FROM phone WHERE id='$_GET[id]'");
    echo "<script>alert('Data Berhasil dihapus!')
    window.location='http://localhost/crash/wp-dashboard/dashboardc.php'
    </script>";
}else{
    header('location:logins.php');
}
?>