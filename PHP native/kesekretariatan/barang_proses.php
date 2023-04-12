<?php 
include '../koneksi.php';
$kode_barang  = $_POST['kode_barang'];
$nama_barang  = $_POST['nama_barang'];
$merk  = $_POST['merk'];
$tipe  = $_POST['tipe'];
$kondisi_barang  = $_POST['kondisi_barang'];
$lokasi  = $_POST['lokasi'];
$divisi  = $_POST['divisi'];
$tanggal_masuk  = $_POST['tanggal_masuk'];
$tanggal_keluar  = $_POST['tanggal_keluar'];
$jumlah =  $_POST['jumlah'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf','png');
$filename = $_FILES['trnfoto']['name'];


if($filename == ""){
	mysqli_query($koneksi, "INSERT INTO master_barang values (NULL, '$kode_barang','$nama_barang','$merk','$tipe','$kondisi_barang','$lokasi','$tanggal_masuk','$tanggal_keluar','$jumlah','','$divisi')")or die(mysqli_error($koneksi));
	header("location:barang.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:barang.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into master_barang values (NULL,'$kode_barang','$nama_barang','$merk','$tipe','$kondisi_barang','$lokasi','$tanggal_masuk','$tanggal_keluar','$jumlah','$file_gambar','$divisi')");
		header("location:barang.php?alert=berhasil");
	}
}

// mysqli_query($koneksi, "insert into master_barang values (NULL, '$sumberdana','$divisi','$jenis','$tanggal','$bulan','$rincian','$jumlah')")or die(mysqli_error($koneksi));
// header("location:barang.php?alert=berhasil");