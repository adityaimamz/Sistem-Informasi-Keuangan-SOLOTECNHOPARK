<?php 
include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$jurusan = $_POST['jurusan'];
$keterangan = $_POST['keterangan'];
$jadwal_pelatihan = $_POST['jadwal_pelatihan'];
$angkatan = $_POST['angkatan'];
$penyaluran = $_POST['penyaluran'];

mysqli_query($koneksi, "UPDATE diklat SET Nama='$nama', Tempat_lahir='$tempat_lahir', Tanggal_lahir='$tanggal_lahir', Alamat='$alamat', Jurusan='$jurusan', Keterangan='$keterangan', Jadwal_pelatihan='$jadwal_pelatihan', Angkatan='$angkatan', Penyaluran='$penyaluran' WHERE Id_diklat='$id'") or die(mysqli_error($koneksi));
header("location:diklat.php?alert=berhasilupdate");
?>
