<?php 
include '../koneksi.php';
$kode_barang  = $_POST['kode_barang'];
$nama_barang  = $_POST['nama_barang'];
$lokasi  = $_POST['lokasi'];
$divisi  = $_POST['divisi'];
$tanggal  = $_POST['tanggal'];


$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename == ""){
	mysqli_query($koneksi, "update master_barang set Kode_barang='$kode_barang',Nama_barang='$nama_barang',Lokasi='$lokasi', Tanggal='$tanggal',Id_divisi='$divisi'") or die(mysqli_error($koneksi));
	header("location:barang.php?alert=berhasilupdate");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:barang.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$xgambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "update master_barang set Kode_barang='$kode_barang',Nama_barang='$nama_barang',Lokasi='$lokasi', Tanggal='$tanggal',Id_divisi='$divisi', Gambar='$xgambar' where Id_barang='$id'");
		header("location:barang.php?alert=berhasilupdate");
	}
}

// mysqli_query($koneksi, "update master_barang set Id_sumberdana='$sumberdana', Id_divisi='$divisi', Jenis_belanja='$jenis', Tanggal='$tanggal', Bulan='$bulan', Rincian='$rincian', Jumlah='$jumlah' where Id_barang='$id'") or die(mysqli_error($koneksi));
// header("location:barang.php?alert=berhasilupdate");