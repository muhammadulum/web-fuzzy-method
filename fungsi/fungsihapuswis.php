<?php
	include "../config/koneksi.php";
	$id_wis = $_GET['hapus3'];
	$query = $koneksi->query("DELETE FROM wisata WHERE id_wis='$id_wis'");
		if($query){
					header("location:../admin/home.php");
		}else{
				echo "Data Gagal Dihapus. <a href='../admin/home.php'>Kembali ke halaman sebelumnya</a>";
		}
?>