<?php
include('../config/koneksi.php');
$id_fasilitas = $_POST['id_fasilitas'];
// $nama_file = $_FILES['gambar']['name'];
//  $ukuran_file = $_FILES['gambar']['size'];
//  $tipe_file = $_FILES['gambar']['type'];
//  $tmp_file = $_FILES['gambar']['tmp_name'];
 $nama_fasilitas = $_POST['nama_fasilitas'];
 $status_fasilitas = $_POST['status_fasilitas'];
 // var_dump($id_wis);
 // exit();

  // $nama_produk   = $_POST['nama_produk'];
  // $deskripsi     = $_POST['deskripsi'];
  // $harga_beli    = $_POST['harga_beli'];
  // $harga_jual    = $_POST['harga_jual'];
  // $gambar_produk = $_FILES['gambar_produk']['name'];
  //cek dulu jika merubah gambar produk jalankan coding ini
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE fasilitas SET nama_fasilitas = '$nama_fasilitas', status_fasilitas = '$status_fasilitas'";
      $query .= "WHERE code_fasilitas = '$id_fasilitas'";
      $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data berhasil diubah.');window.location='../admin/fasilitaswisata.php';</script>";
      }
    

?>