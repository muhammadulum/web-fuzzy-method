 <?php
// Load file koneksi.php
include "../config/koneksi.php";
// Ambil Data yang Dikirim dari Form
 $nama_objek = $_POST['nama_objek'];
 $harga = $_POST['harga'];
 $jum_fasilitas = $_POST['jum_fasilitas'];
 $ket_tempat = $_POST['ket_tempat'];

  $gambar =$_FILES['gambar']['name'];

$id_fasilitas = $_POST['code_fasilitas'];
// print (json_encode($id_fasilitas));
// die();

$id_fasilitasarray = implode(',', $id_fasilitas);
// print(json_encode($id_fasilitasarray));
// die();
  // $id_fasilitasarray = $_POST['id_fasilitas'];
  // foreach ($id_fasilitasarray as $value_id) {
  //     $source.=$value_id.", ";
  //   }

  // $id_fasilitas=substr($source,0,-1);
// $jumlah_dipilih= count($id_fasilitas);

//cek dulu jika ada gambar produk jalankan coding ini

  if($gambar != "" and !empty($id_fasilitas)) {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../img/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO wisata (nama_objek, harga, ket_tempat, jum_fasilitas, code_fasilitas, gambar) VALUES ('$nama_objek', '$harga', '$ket_tempat', $jum_fasilitas, '$id_fasilitasarray', '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='../admin/home.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../admin/home.php';</script>";
            }
          
} else {
   $query = "INSERT INTO wisata (nama_objek, harga, ket_tempat, jum_fasilitas, code_fasilitas, gambar) VALUES ('$nama_objek', '$harga', '$ket_tempat', '$jum_fasilitas', '$id_fasilitasarray', null)";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='../admin/home.php';</script>";
                  }
}



