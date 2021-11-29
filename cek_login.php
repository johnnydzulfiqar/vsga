<?php 
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$data = mysqli_query($db,"select * from admin where username='$username' and password='$password'");
$cek = mysqli_num_rows($data);
if($cek > 0){
$_SESSION['username'] = $username;
$_SESSION['status'] = "login";
header("location:home.php");
}else{
echo "<script>alert('Username & Password salah gunakan (Username : admin & password : admin)')</script>";
}
include 'index.php';
?>
