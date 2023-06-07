<?php 
include '../koneksi.php';
$id  = $_GET['id'];
$idk  = $_GET['idk'];

mysqli_query($koneksi, "delete from riwayat_jabatan where Id_riwayat_jabatan='$id'");
header("location:edit_jabatan.php?alert=berhasilupdate&id=" . urlencode($idk));
// var_dump($idk);
