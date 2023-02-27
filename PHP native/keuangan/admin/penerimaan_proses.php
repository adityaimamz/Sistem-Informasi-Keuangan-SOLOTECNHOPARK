<?php 
include '../koneksi.php';
$tanggal  = $_POST['tanggal'];
$bulan  = $_POST['bulan'];
$No_tandaterima  = $_POST['No_tandaterima'];
$metode  = $_POST['metode'];
$nama  = $_POST['nama'];
$alamat  = $_POST['alamat'];
$keperluan  = $_POST['keperluan'];
$nominal  = $_POST['nominal'];

// $rand = rand();
// $allowed =  array('jpg','jpeg','pdf');
// $filename = $_FILES['trnfoto']['name'];

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

// if($filename == ""){
	mysqli_query($koneksi, "insert into master_penerimaan values (NULL, NULL,'$bulan','$tanggal','$nama','$keperluan','$alamat','$No_tandaterima', '$nominal', '$metode')")or die(mysqli_error($koneksi));
	header("location:penerimaan.php?alert=berhasil");
// }else{
	// $ext = pathinfo($filename, PATHINFO_EXTENSION);

	// if(!in_array($ext,$allowed) ) {
	// 	header("location:transaksi.php?alert=gagal");
	// }else{
		// move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		// $file_gambar = $rand.'_'.$filename;
		// mysqli_query($koneksi, "insert into transaksi values (NULL,'$tanggal','$jenis','$kategori','$nominal','$keterangan','$file_gambar','$bank')");
	// 	header("location:transaksi.php?alert=berhasil");
	// }
// }

// mysqli_query($koneksi, "insert into transaksi values (NULL,'$tanggal','$jenis','$kategori','$nominal','$keterangan','$bank')")or die(mysqli_error($koneksi));
// header("location:transaksi.php");