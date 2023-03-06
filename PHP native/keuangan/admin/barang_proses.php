<?php 
include '../koneksi.php';
$tanggal  = $_POST['tanggal'];
$divisi  = $_POST['divisi'];
$nama_barang  = $_POST['nama_barang'];
$kode_barang  = $_POST['kode_barang'];
$lokasi  = $_POST['lokasi'];


$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];

if($filename == ""){
	mysqli_query($koneksi, "insert into master_barang values (NULL, '$nama_barang','$lokasi','$divisi','$tanggal','$kode_barang','')")or die(mysqli_error($koneksi));
	header("location:barang.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:barang.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into master_barang values (NULL, '$nama_barang','$lokasi','$divisi','$tanggal','$kode_barang', '$file_gambar')");
		header("location:barang.php?alert=berhasil");
	}
}

// mysqli_query($koneksi, "insert into master_barang values (NULL, '$sumberdana','$divisi','$jenis','$tanggal','$bulan','$rincian','$jumlah')")or die(mysqli_error($koneksi));
// header("location:barang.php?alert=berhasil");