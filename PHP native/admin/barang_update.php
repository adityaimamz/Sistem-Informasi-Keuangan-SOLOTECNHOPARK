<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama_barang  = $_POST['nama_barang'];
$nama_gedung  = $_POST['nama_gedung'];
$nama_ruanganarea  = $_POST['nama_ruanganarea'];
$tanggal_masuk  = $_POST['tanggal_masuk'];
$tanggal_keluar  = $_POST['tanggal_keluar'];
$jenis_merk_tipe  = $_POST['jenis_merk_tipe'];
$kode_label_stp  = $_POST['kode_label_stp'];
$kode_label_pemkot  = $_POST['kode_label_pemkot'];
$jumlah_barang =  $_POST['jumlah_barang'];
$gambar = $_FILES['gambar']['name'];
$drive = $_POST['drive'];
$kondisi_barang  = $_POST['kondisi_barang'];
$catatan  = $_POST['catatan'];


$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['gambar']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename == ""){
	mysqli_query($koneksi, "update master_barang set Nama_barang='$nama_barang', Nama_gedung='$nama_gedung', Nama_ruanganarea='$nama_ruanganarea', Tanggal_masuk='$tanggal_masuk', Tanggal_keluar='$tanggal_keluar', JenisMerkTipe='$jenis_merk_tipe', Kode_label_STP='$kode_label_stp', Kode_label_pemkot='$kode_label_pemkot', Jumlah_barang='$jumlah_barang', Drive='$drive', Kondisi_barang='$kondisi_barang', Catatan='$catatan' where Id_barang='$id'") or die(mysqli_error($koneksi));
	header("location:barang.php?alert=berhasilupdate");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:barang.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['gambar']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$xgambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "update master_barang set Nama_barang='$nama_barang', Nama_gedung='$nama_gedung', Nama_ruanganarea='$nama_ruanganarea', Tanggal_masuk='$tanggal_masuk', Tanggal_keluar='$tanggal_keluar', JenisMerkTipe='$jenis_merk_tipe', Kode_label_STP='$kode_label_stp', Kode_label_pemkot='$kode_label_pemkot', Jumlah_barang='$jumlah_barang', Gambar='$xgambar', Drive='$drive', Kondisi_barang='$kondisi_barang', Catatan='$catatan' where Id_barang='$id'");
		header("location:barang.php?alert=berhasilupdate");
	}
}

