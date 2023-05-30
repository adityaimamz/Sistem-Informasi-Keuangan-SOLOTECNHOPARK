<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$tanggal  = $_POST['tanggal'];
$bulan  = $_POST['bulan'];
$divisi  = $_POST['divisi'];
$jenis  = $_POST['jenis'];
$rincian  = $_POST['rincian'];
$jumlah  = $_POST['jumlah'];
$sumberdana  = $_POST['sumberdana'];
$kode_pengeluaran = $_POST['kode_pengeluaran'];
$drive  = $_POST['drive'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf', 'png');
$filename = $_FILES['trnfoto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename == ""){
	mysqli_query($koneksi, "update master_pengeluaran set Kode_pengeluaran='$kode_pengeluaran',Id_sumberdana='$sumberdana', Id_divisi='$divisi', Id_jenis='$jenis', Tanggal='$tanggal', Bulan='$bulan', Rincian='$rincian', Jumlah='$jumlah', Drive='$drive' where Id_pengeluaran='$id'") or die(mysqli_error($koneksi));
	header("location:pengeluaran.php?alert=berhasilupdate");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:pengeluaran.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$xgambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "update master_pengeluaran set Kode_pengeluaran='$kode_pengeluaran', Id_sumberdana='$sumberdana', Id_divisi='$divisi', Id_jenis='$jenis', Tanggal='$tanggal', Bulan='$bulan', Rincian='$rincian', Jumlah='$jumlah', Bukti_lpj='$xgambar', Drive='$drive' where Id_pengeluaran='$id'");
		header("location:pengeluaran.php?alert=berhasilupdate");
	}
}

// mysqli_query($koneksi, "update master_pengeluaran set Id_sumberdana='$sumberdana', Id_divisi='$divisi', Id_jenis='$jenis', Tanggal='$tanggal', Bulan='$bulan', Rincian='$rincian', Jumlah='$jumlah' where Id_pengeluaran='$id'") or die(mysqli_error($koneksi));
// header("location:pengeluaran.php?alert=berhasilupdate");