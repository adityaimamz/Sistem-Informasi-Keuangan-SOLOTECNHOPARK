<?php 
session_start();
include '../koneksi.php';

//status
if(isset($_GET['status']) && isset($_GET['id'])) {
	$id = $_GET['id'];
	
	if($_GET['status']=='n'){
		$status="invoice";
	}else{
		$status="voice";
	}
	
	mysqli_query($koneksi, "UPDATE master_penerimaan SET Status='$status' where Id_penerimaan='$id'") or die(mysqli_error($koneksi));
	header("location:tagihan.php?alert=berhasilupdate");
}
//akhir aktif

?>