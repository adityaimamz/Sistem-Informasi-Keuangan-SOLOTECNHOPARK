<?php 
include '../koneksi.php';

$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$jurusan = $_POST['jurusan'];
$keterangan = $_POST['keterangan'];
$jadwal_pelatihan = $_POST['jadwal_pelatihan'];
$angkatan = $_POST['angkatan'];
$penyaluran = $_POST['penyaluran'];
$status = $_POST['status'];

mysqli_query($koneksi, "INSERT INTO diklat (Nama, Tempat_lahir, Tanggal_lahir, Alamat, Jurusan, Keterangan, Jadwal_pelatihan, Angkatan, Penyaluran, Id_status) VALUES ('$nama', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$jurusan', '$keterangan', '$jadwal_pelatihan', '$angkatan', '$penyaluran','$status' )") or die(mysqli_error($koneksi));
header("location:diklat.php?alert=berhasil");
?>
