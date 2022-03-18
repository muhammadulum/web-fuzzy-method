 <?php
// Load file koneksi.php
include "../config/koneksi.php";
// Ambil Data yang Dikirim dari Form

 $nama_fasilitas = $_POST['nama_fasilitas'];
 $status_fasilitas = $_POST['status_fasilitas'];

    $query = mysqli_query($koneksi, 'select * from fasilitas');
      //cek dulu apakah ada sudah ada kode di tabel.    
       //cek kode jika telah tersedia    
       $data = mysqli_num_rows($query)  ;

       $row = $data+1; 
      
      $batas = str_pad($row, 3, "0", STR_PAD_LEFT);  

      $kodetampil = "KD".$batas;  //format kode

$kode= 1;
 
// // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// // dan diubah ke integer dengan (int)
 $urutan = (int) substr($kode, 3, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "FAS";
$code_fasilitas = $huruf . sprintf("%03s", $urutan);
// echo $kodeBarang;


$sql = mysqli_query($koneksi,"insert into fasilitas values('$kodetampil','$nama_fasilitas','$status_fasilitas')");


      if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :".$tipe_file."'".$tipe_file."'".$tipe_file."'
        // echo '<script type="text/javascript"> alert("Data Tersimpan") </script>';
        header("location: ../admin/fasilitaswisata.php"); // Redirectke halaman objekwis.php
      }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href=' ../admin/fasilitaswisata.php'>Kembali Ke Form</a>";
      }
?>