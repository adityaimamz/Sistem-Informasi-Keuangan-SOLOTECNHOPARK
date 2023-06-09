<?php 
include '../koneksi.php';
$id  = $_GET['id'];
$idk  = $_GET['idk'];

mysqli_query($koneksi, "delete from riwayat_pelatihan where Id_pelatihan='$id'");
header("location:edit_karyawan_pelatihan.php?alert=berhasilupdate&id=" . urlencode($idk));
// var_dump($idk);
