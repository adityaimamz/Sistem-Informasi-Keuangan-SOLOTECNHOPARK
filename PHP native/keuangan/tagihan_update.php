<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$No_tandaterima  = $_POST['No_tandaterima'];
$metode  = $_POST['metode'];
$drive  = $_POST['drive'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf', 'png');
$filename = $_FILES['trnfoto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename == ""){
	mysqli_query($koneksi, "update master_penerimaan set No_tandaterima='$No_tandaterima', Id_metode='$metode', Status='voice', Drive='$drive' where Id_penerimaan='$id'") or die(mysqli_error($koneksi));
	header("location:tagihan.php?alert=berhasilupdate");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:tagihan.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$xgambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "update master_penerimaan set No_tandaterima='$No_tandaterima', Id_metode='$metode', Bukti='$xgambar', Status='voice', Drive='$drive' where Id_penerimaan='$id'");
		header("location:tagihan.php?alert=berhasilupdate");
	}
}

// mysqli_query($koneksi, "update transaksi set transaksi_tanggal='$tanggal', transaksi_jenis='$jenis', transaksi_kategori='$kategori', transaksi_nominal='$nominal', transaksi_keterangan='$keterangan', transaksi_bank='$bank' where transaksi_id='$id'") or die(mysqli_error($koneksi));
// header("location:transaksi.php");