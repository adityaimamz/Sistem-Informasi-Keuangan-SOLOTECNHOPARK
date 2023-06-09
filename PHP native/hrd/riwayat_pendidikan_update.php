<?php 
include '../koneksi.php';
$id = $_POST['id'];
$idk = $_POST['idk'];
$tingkat = $_POST['tingkat'];
$jurusan = $_POST['jurusan'];
$instansi = $_POST['instansi'];
$gelar = $_POST['gelar'];
$tahun = $_POST['tahun'];

mysqli_query($koneksi, "UPDATE riwayat_pendidikan SET Tingkat='$tingkat', Jurusan='$jurusan', Nama_instansi='$instansi', Gelar='$gelar', Tahun_lulus='$tahun' WHERE Id_pendidikan='$id'") or die(mysqli_error($koneksi));
header("location:edit_karyawan_pendidikan.php?alert=berhasilupdate&id=" . urlencode($idk));
?>
