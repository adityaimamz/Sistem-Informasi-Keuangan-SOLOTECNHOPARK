<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$idk  = $_POST['idk'];
$tmt  = $_POST['tmt'];
$jabatan  = $_POST['jabatan'];
$unit = $_POST['unit'];

mysqli_query($koneksi, "update riwayat_jabatan set TMT='$tmt', Jabatan='$jabatan', Unit_kerja='$unit' where Id_riwayat_jabatan='$id'")  or die(mysqli_error($koneksi));
header("location:edit_karyawan_jabatan.php?alert=berhasilupdate&id=" . urlencode($idk));
// header("location:edit_jabatan.php");