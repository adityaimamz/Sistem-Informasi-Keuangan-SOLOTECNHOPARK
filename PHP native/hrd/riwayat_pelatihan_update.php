<?php 
include '../koneksi.php';
$id = $_POST['id'];
$idk = $_POST['idk'];
$nama = $_POST['nama'];
$tipe = $_POST['tipe'];
$penyelenggara = $_POST['penyelenggara'];
$tanggal = $_POST['tanggal'];

mysqli_query($koneksi, "UPDATE riwayat_pelatihan SET Nama_diklat='$nama', Tipe_diklat='$tipe', Penyelenggara='$penyelenggara', Tgl_lulus='$tanggal' WHERE Id_pelatihan='$id'") or die(mysqli_error($koneksi));
header("location:edit_karyawan.php?alert=berhasilupdate&id=" . urlencode($idk));
?>
