<?php 
include '../koneksi.php';
$id = $_POST['id'];
$idk = $_POST['idk'];
$pelanggaran = $_POST['pelanggaran'];
$hukuman = $_POST['hukuman'];
$tingkat = $_POST['tingkat'];
$tanggal = $_POST['tanggal'];

mysqli_query($koneksi, "UPDATE riwayat_hukuman SET Pelanggaran='$pelanggaran', Hukuman='$hukuman', Tingkat_hukuman='$tingkat', Tgl_sk='$tanggal' WHERE Id_hukuman='$id'") or die(mysqli_error($koneksi));
header("location:edit_karyawan.php?alert=berhasilupdate&id=" . urlencode($idk));
?>
