<?php
// koneksi database
include '../config/koneksi.php';

// menangkap data yang di kirim dari form
$objek = $_POST['objek'];
$harga = $_POST['harga'];
$jarak = $_POST['jarak'];
$fasilitas = $_POST['jum_fas'];
//$cek = $_GET['cek'];
$id_wis = $_POST['id_wis'];
$nama_pengunjung = $_POST['nama_pengunjung'];
$alamat = $_POST['alamat'];
$komentar = $_POST['komentar'];
// var_dump($objek."=".$harga."=".$jarak."=".$fasilitas."=".$id_wis."=".$nama_pengunjung."=".$alamat."=".$komentar);
// exit();

// input ke tabel pengunjung
$sqlbukutamu = "INSERT INTO buku_tamu (id_pengunjung, nama_pengunjung, alamat,komentar)
VALUES (null, '$nama_pengunjung', '$alamat','$komentar')";
$cekpertama=$koneksi->query($sqlbukutamu);


if ($cekpertama==false) {
  # code...
  echo '<script type="text/javascript"> alert("Data Gagal Tersimpan") </script>';
  echo "Error: " . $sqlbukutamu . "<br>" . $koneksi->error;
}
//HARGA MURAH
$m1_2=0;
 if($harga<=5000){
 	$m1_2=1;
 }
 if($harga>25000){
 	$m1_2=0;
 }
 if(($harga>=5000)&&($harga<=25000)){
 	$m1_2=(25000-$harga)/(25000-5000);
 }

//HARGA SEDANG
 $m1_3=0;
 if($harga<=5000 || $harga>=45000){
 	$m1_3=0;
 }
 if($harga>=5000 && $harga<=25000){
 	$m1_3=($harga-5000)/(25000-5000);
 }
 if(($harga>=25000)&&($harga<=45000)){
 	$m1_3=(45000-$harga)/(45000-25000);
 }

//HARGA MAHAL
$m1=0;
 if($harga<=25000){
 	$m1=0;
 }
 if($harga>=45000){
 	$m1=1;
 }
 if(($harga>=25000)&&($harga<=45000)){
 	$m1=($harga-25000)/(45000-25000);
 }


 //JARAK DEKAT
 $m2_2=0;
 if($jarak<=15){
 	$m2_2=1;
 }
 if($jarak>35){
 	$m2_2=0;
 }
 if(($jarak>=15)&&($jarak<=35)){
 	$m2_2=(35-$jarak)/(35-15);
 }

//JARAK SEDANG
 $m2_3=0;
 if($jarak<=15 || $jarak>=55){
 	$m2_3=0;
 }
 if($jarak>=15 && $jarak<=35){
 	$m2_3=($jarak-15)/(35-15);
 }
 if(($jarak>=35)&&($jarak<=55)){
 	$m2_3=(55-$jarak)/(55-35);
 }

//JARAK JAUH
$m2=0;
 if($jarak<=35){
 	$m2=0;
 }
 if($jarak>=55){
 	$m2=1;
 }
 if(($jarak>=35)&&($jarak<=55)){
 	$m2=($jarak-35)/(55-35);
 }


 //FASILITAS SEDIKIT
$m3=0;
 if($fasilitas<=5){
 	$m3=1;
 }
 if($fasilitas>7){
 	$m3=0;
 }
 if(($fasilitas>=5)&&($fasilitas<=7)){
 	$m3=(7-$fasilitas)/(7-5);
 }

//FASILITAS SEDANG
 $m3_2=0;
 if(($fasilitas<=5) || ($fasilitas>=9)){
 	$m3_2=0;
 }
 if(($fasilitas>=5) && ($fasilitas<=7)){
 	$m3_2=($fasilitas-5)/(7-5);
 }
 if(($fasilitas>=7) && ($fasilitas<=9)){
 	$m3_2=(9-$fasilitas)/(9-7);
 }


//FASILITAS BANYAK
$m3_3=0;
if($fasilitas<=7){
	$m3_3=0;
}
if($fasilitas>=9){
	$m3_3=1;
}
if(($fasilitas>=7) && ($fasilitas<=9)){
	$m3_3=($fasilitas-7)/(9-7);
}


$a1=$m1;
if($a1>$m2){
	$a1=$m2;
 }
   if ($a1>$m3) {
		$a1=$m3;
	}


 $z1=(100-$a1*(100-50));


$a1_2=$m1_2;
if($a1_2>$m2_2){
	$a1_2=$m2_2;
 }
   if ($a1_2>$m3_2) {
		$a1_2=$m3_2;
	}

 $z2=(50+$a1_2*(100-50));


$a1_3=$m1_3;
if($a1_3>$m2_3){
	$a1_3=$m2_3;
 }
   if ($a1_3>$m3_3) {
		$a1_3=$m3_3;
	}

 $z3=(50+$a1_3*(100-50));


$z=(($a1*$z1)+($a1_2*$z2)+($a1_3*$z3))/($a1+$a1_2+$a1_3);


//R / TR
$muTR=0;
$muR=0;

if ($z<=50){
	$muTR=1;
}
if($z>100){
	$muTR=0;
}
if(is_nan($z)){
	$muTR=0;
}
if($z>50 && $z<=100){
	$muTR=(100-$z)/(100-50);
}


 if($z<=50){
  	$muR=0;
  }
 if($z>100){
  	$muR=1;
  }
 if(is_nan($z)){
  	$muR=0;
  }

  if(($z>=50)&&($z<=100)){
  	$muR=($z-50)/(100-50);
  }


  //REKOM/TIDAK
  if($muTR>$muR){
  	$ket="Objek Tidak Direkomendasi";
  }
  else{
	  if($jarak<=35){
		$ket="Objek Direkomendasi";
	  }
	  else{
		$ket="Objek Tidak Direkomendasi";
	  }

  }
  $sql = "INSERT INTO fuzzy (id_fuzzy,id_wisata, nama_objek, harga,jarak,fasilitas,bobot,muTR,muR,keterangan)
    VALUES (null,'$id_wis','$objek','$harga','$jarak','$fasilitas','$z','$muTR','$muR','$ket')";

    if ($koneksi->query($sql) === TRUE) {
      echo '<script type="text/javascript"> alert("Data Tersimpan") </script>';
    } else {
      echo '<script type="text/javascript"> alert("Data Gagal Tersimpan") </script>';
      echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
    header("location:../ngecek.php?ket=".$ket."&objek=".$objek."&harga=".$harga."&fasilitas=".$fasilitas."&jarak=".$jarak);
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../ngecek.php">'

// // menginput data ke database
// $save = mysqli_query($koneksi,"insert into fuzzy values('','$id_wis','$objek','$harga','$jarak','$fasilitas','$z','$muTR','$muR','$ket')");
//
// if($save)
// {
//
//
// 	echo '<script type="text/javascript"> alert("Data Tersimpan") </script>';
// 	// header("location:rekomendasi.php");
// }
// else
// {
// 	echo '<script type="text/javascript"> alert("Data Gagal Tersimpan") </script>';
//
// 	// mengalihkan halaman kembali ke rekomendasi.php
//
// }
// header("location:rekomendasi-hasil.php?ket=".$ket."&objek=".$objek."&harga=".$harga."&fasilitas=".$fasilitas."&jarak=".$jarak);
// echo '<META HTTP-EQUIV="Refresh" Content="0; URL=rekomendasi-hasil.php">';
// exit;
?>
