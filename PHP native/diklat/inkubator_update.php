<?php
include '../koneksi.php';
$id = $_POST['id'];
$nama_startup = $_POST['nama_startup'];
$nama_pengusul = $_POST['nama_pengusul'];
$alamat = $_POST['alamat'];
$tahun_angkatan = $_POST['tahun_angkatan'];
$status = $_POST['status'];

mysqli_query($koneksi, "UPDATE inkubator SET Nama_startup='$nama_startup', Nama_Pengusul='$nama_pengusul', Alamat='$alamat', Tahun_Angkatan='$tahun_angkatan', Id_statusinkubator='$status' WHERE Id_inkubator='$id'") or die(mysqli_error($koneksi));
header("location:inkubator.php?alert=berhasilupdate");
?>
