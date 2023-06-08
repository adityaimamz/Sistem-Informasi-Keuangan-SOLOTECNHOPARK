<?php 
include '../koneksi.php';
$id  = $_GET['id'];
$idk  = $_GET['idk'];

mysqli_query($koneksi, "delete from riwayat_hukuman where Id_hukuman='$id'");
header("location:edit_karyawan_hukuman.php?alert=berhasilupdate&id=" . urlencode($idk));
// var_dump($idk);
