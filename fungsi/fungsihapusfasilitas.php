<?php
	include "../config/koneksi.php";
	$id_fasilitas = $_GET['hapus3'];
	$query = $koneksi->query("DELETE FROM fasilitas WHERE id_fasilitas='$id_fasilitas'");
		if($query){
					header("location:../admin/fasilitaswisata.php");
		}else{
				echo "Data Gagal Dihapus. <a href='../admin/fasilitaswisata.php'>Kembali ke halaman sebelumnya</a>";
		}
?>