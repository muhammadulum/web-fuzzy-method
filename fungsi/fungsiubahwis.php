<?php
include('../config/koneksi.php');
$id_wis = $_POST['id_wis'];
// $nama_file = $_FILES['gambar']['name'];
//  $ukuran_file = $_FILES['gambar']['size'];
//  $tipe_file = $_FILES['gambar']['type'];
//  $tmp_file = $_FILES['gambar']['tmp_name'];
if(isset($_FILES['gambar'])){
    $nama_file=$_FILES['gambar']['name'];
     $ukuran_file = $_FILES['gambar']['size'];
 $tipe_file = $_FILES['gambar']['type'];
 $tmp_file = $_FILES['gambar']['tmp_name'];
}

 $nama_wisata = $_POST['nama'];
 $harga = $_POST['harga'];
 $fas = $_POST['jumfas'];
 $ket_tempat = $_POST['kettempat'];
 // var_dump($id_wis);
 // exit();
 $id_fasilitas = $_POST['code_fasilitas'];

$id_fasilitasarray = implode(',', $id_fasilitas);
// print (json_encode($id_fasilitasarray));
// die();

  // $nama_produk   = $_POST['nama_produk'];
  // $deskripsi     = $_POST['deskripsi'];
  // $harga_beli    = $_POST['harga_beli'];
  // $harga_jual    = $_POST['harga_jual'];
  // $gambar_produk = $_FILES['gambar_produk']['name'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  if($nama_file != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $nama_file); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$nama_file; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, '../img/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE wisata SET nama_objek = '$nama_wisata', harga = '$harga', ket_tempat = '$ket_tempat', gambar = '$nama_gambar_baru', jum_fasilitas = '$fas'";
                    $query .= "WHERE id_wis = '$id_wis'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='../admin/home.php';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../admin/home.php';</script>";
              }
    }elseif ($id_fasilitasarray == NULL and $nama_file == NULL) {

                   $query  = "UPDATE wisata SET nama_objek = '$nama_wisata', harga = '$harga', ket_tempat = '$ket_tempat', jum_fasilitas = '$fas'";
                    $query .= "WHERE id_wis = '$id_wis'";
                    $result = mysqli_query($koneksi, $query);

                     if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='../admin/home.php';</script>";
                    }
    //            else {     
    //            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
    //               echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../admin/home.php';</script>";
              
    // }    
    }elseif($nama_file != "" and $id_fasilitasarray == NULL) {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $nama_file); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$nama_file; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, '../img/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE wisata SET nama_objek = '$nama_wisata', harga = '$harga', ket_tempat = '$ket_tempat', gambar = '$nama_gambar_baru', jum_fasilitas = '$fas'";
                    $query .= "WHERE id_wis = '$id_wis'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='../admin/home.php';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../admin/home.php';</script>";
              }
    }elseif($nama_file != "" and $id_fasilitas != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $nama_file); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$nama_file; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, '../img/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE wisata SET nama_objek = '$nama_wisata', harga = '$harga', ket_tempat = '$ket_tempat', gambar = '$nama_gambar_baru', jum_fasilitas = '$fas',code_fasilitas='$id_fasilitasarray'";
                    $query .= "WHERE id_wis = '$id_wis'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='../admin/home.php';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../admin/home.php';</script>";
              }
    }

     else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE wisata SET nama_objek = '$nama_wisata', harga = '$harga', ket_tempat = '$ket_tempat', jum_fasilitas = '$fas',code_fasilitas='$id_fasilitasarray'";
      $query .= "WHERE id_wis = '$id_wis'";
      $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data berhasil diubah.');window.location='../admin/home.php';</script>";
      }
    }

?>