<?php 
include '../koneksi.php';
$id = $_POST['id'];
$idk = $_POST['idk'];
$tanggal = $_POST['tanggal'];
$jenis_cuti = $_POST['jenis_cuti'];
$keperluan = $_POST['keperluan'];
$mulai_cuti = $_POST['mulai_cuti'];
$selesai_cuti = $_POST['selesai_cuti'];

mysqli_query($koneksi, "UPDATE riwayat_cuti SET Tgl_sk='$tanggal', Jenis_cuti='$jenis_cuti', Keperluan='$keperluan', Mulai_cuti='$mulai_cuti', Selesai_cuti='$selesai_cuti' WHERE id_riwayatcuti='$id'") or die(mysqli_error($koneksi));
header("location:edit_karyawan.php?alert=berhasilupdate&id=" . urlencode($idk));
?>
