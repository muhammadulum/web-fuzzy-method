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
   $sql = "SELECT * FROM admin WHERE username = '$username'";
   $query = $koneksi->query($sql);
   $hasil = $query->fetch_assoc();
   if($query->num_rows == 0) {
     echo "<div align='center'>Username Belum Terdaftar! <a href='../admin/login.php'>Kembali</a></div>";
   } else {
     if($passmd5 <> $hasil['password']) {
 echo "<div align='center'>Username atau Password Salah <a href='../admin/home.php'>Kembali</a></div>";
     } else {
       $_SESSION['username'] = $hasil['username'];
       header('location:../admin/home.php');
     }
   }
?>