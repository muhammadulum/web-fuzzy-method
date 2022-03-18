<!DOCTYPE html>
<html lang="en">

<head>
<title>Login</title>
<link rel="icon" href="img/tugujogja.jpg">
</head></html>
<?php
   session_start();

   require_once("../config/koneksi.php");
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $passmd5= md5($pass);   
   $sql = "Insert into admin (username,password) values ('$username','$passmd5')";
   $query = $koneksi->query($sql);
//    $hasil = $query->fetch_assoc();
   if($query) {
     echo "<div align='center'>sukses mendaftar <a href='../admin/login.php'>Kembali</a></div>";
   } else 
 echo "<div align='center'>Gagal mendaftar <a href='../admin/register.php'>Kembali</a></div>";
     
   
?>