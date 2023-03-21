<?php 
include '../koneksi.php';
$nama_barang  = $_POST['nama_barang'];
$lokasi  = $_POST['lokasi'];
$divisi  = $_POST['divisi'];
$tanggal  = $_POST['tanggal'];
$kode_barang =  $_POST['kode_barang'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf','png');
$filename = $_FILES['trnfoto']['name'];


if($filename == ""){
	mysqli_query($koneksi, "insert into master_barang values (NULL, '$kode_barang','$nama_barang','$lokasi','$tanggal','','$divisi')")or die(mysqli_error($koneksi));
	header("location:barang.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:barang.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into master_barang values (NULL,'$kode_barang','$nama_barang','$lokasi','$tanggal','$file_gambar','$divisi')");
		header("location:barang.php?alert=berhasil");
	}
}

// mysqli_query($koneksi, "insert into master_barang values (NULL, '$sumberdana','$divisi','$jenis','$tanggal','$bulan','$rincian','$jumlah')")or die(mysqli_error($koneksi));
// header("location:barang.php?alert=berhasil");