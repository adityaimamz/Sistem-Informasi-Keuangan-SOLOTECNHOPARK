<?php 
include '../koneksi.php';
$tanggal  = $_POST['tanggal'];
$bulan  = $_POST['bulan'];
$divisi  = $_POST['divisi'];
$jenis  = $_POST['jenis'];
$rincian  = $_POST['rincian'];
$jumlah  = $_POST['jumlah'];
$sumberdana  = $_POST['sumberdana'];
$drive  = $_POST['drive'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf','png');
$filename = $_FILES['trnfoto']['name'];
// membuat kode pengeluaran unik
$kode_pengeluaran = "PGR" . date("YmdHis");

if($filename == ""){
	mysqli_query($koneksi, "insert into master_pengeluaran values (NULL, '$kode_pengeluaran', '$sumberdana','$divisi','$jenis','$tanggal','$bulan','$rincian','$jumlah','', '$drive')")or die(mysqli_error($koneksi));
	header("location:pengeluaran.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:pengeluaran.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into master_pengeluaran values (NULL, '$kode_pengeluaran', '$sumberdana','$divisi','$jenis','$tanggal','$bulan','$rincian','$jumlah', '$file_gambar', '$drive')");
		header("location:pengeluaran.php?alert=berhasil");
	}
}

// mysqli_query($koneksi, "insert into master_pengeluaran values (NULL, '$sumberdana','$divisi','$jenis','$tanggal','$bulan','$rincian','$jumlah')")or die(mysqli_error($koneksi));
// header("location:pengeluaran.php?alert=berhasil");