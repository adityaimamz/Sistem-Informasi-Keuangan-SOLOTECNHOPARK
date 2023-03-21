<?php 
session_start();
include '../koneksi.php';
$tanggal  = $_POST['tanggal'];
$bulan  = $_POST['bulan'];
$No_tandaterima  = $_POST['No_tandaterima'];
$metode  = $_POST['metode'];
$nama  = $_POST['nama'];
$alamat  = $_POST['alamat'];
$keperluan  = $_POST['keperluan'];
$nominal  = $_POST['nominal'];
$status = $_POST['status'];
$drive = $_POST['drive'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf', 'png');
$filename = $_FILES['trnfoto']['name'];

$kode_penerimaan = "PNR" . date("YmdHis");

// $rekening = mysqli_query($koneksi,"select * from metode_bayar where Id_metode='$metode'");
// $r = mysqli_fetch_assoc($rekening);

// if($jenis == "Pemasukan"){

// 	$saldo_sekarang = $r['bank_saldo'];
// 	$total = $saldo_sekarang+$nominal;
// 	mysqli_query($koneksi,"update bank set bank_saldo='$total' where bank_id='$bank'");

// }elseif($jenis == "Pengeluaran"){

// 	$saldo_sekarang = $r['bank_saldo'];
// 	$total = $saldo_sekarang-$nominal;
// 	mysqli_query($koneksi,"update bank set bank_saldo='$total' where bank_id='$bank'");

// }

if($filename == ""){
	mysqli_query($koneksi, "insert into master_penerimaan values (NULL,'$kode_penerimaan','$bulan','$tanggal','$nama','$keperluan','$alamat', 'NULL', '$nominal', 'NULL','','voice', '$drive')")or die(mysqli_error($koneksi));
	header("location:tagihan.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:penerimaan.php?alert=gagal");
	}elseif($No_tandaterima == "" && $metode == ""){
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into master_penerimaan values (NULL,'$kode_penerimaan','$bulan','$tanggal','$nama','$keperluan','$alamat','NULL', '$nominal', 'NULL','$file_gambar','voice', '$drive')");
		header("location:tagihan.php?alert=berhasil");
	}else{
	    move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into master_penerimaan values (NULL,'$kode_penerimaan','$bulan','$tanggal','$nama','$keperluan','$alamat','$No_tandaterima', '$nominal', '$metode','$file_gambar','invoice', '$drive')");
		header("location:penerimaan.php?alert=berhasil");
	}
}

//status
if(isset($_GET['status']) && isset($_GET['id'])) {
	$id = $_GET['id'];
	
	if($_GET['status']=='n'){
		$status="invoice";
	}else{
		$status="voice";
	}
	
	mysqli_query($koneksi, "UPDATE master_penerimaan SET Status='$status' where Id_penerimaan='$id'") or die(mysqli_error($koneksi));
	header("location:penerimaan.php?alert=berhasilupdate");
}
//akhir aktif


?>