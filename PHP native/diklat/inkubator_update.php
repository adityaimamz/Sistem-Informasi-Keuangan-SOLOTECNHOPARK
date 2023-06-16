<?php
include '../koneksi.php';
$id = $_POST['id'];
$nama_startup = $_POST['nama_startup'];
$nama_pengusul = $_POST['nama_pengusul'];
$alamat = $_POST['alamat'];
$tahun_angkatan = $_POST['tahun_angkatan'];
$status = $_POST['status'];

mysqli_query($koneksi, "UPDATE diklat SET Nama_Startup='$nama_startup', Nama_Pengusul='$nama_pengusul', Alamat='$alamat', Tahun_Angkatan='$tahun_angkatan', Status='$status' WHERE Id_diklat='$id'") or die(mysqli_error($koneksi));
header("location:inkubator.php?alert=berhasilupdate");
?>
