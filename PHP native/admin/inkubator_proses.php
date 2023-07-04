<?php
include '../koneksi.php';

$nama_startup = $_POST['nama_startup'];
$nama_pengusul = $_POST['nama_pengusul'];
$alamat = $_POST['alamat'];
$tahun_angkatan = $_POST['tahun_angkatan'];
$status = $_POST['status'];

mysqli_query($koneksi, "INSERT INTO inkubator (Nama_startup, Nama_Pengusul, Alamat, Tahun_Angkatan, Id_statusinkubator) VALUES ('$nama_startup', '$nama_pengusul', '$alamat', '$tahun_angkatan', '$status')") or die(mysqli_error($koneksi));
header("location:inkubator.php?alert=berhasil");
?>
