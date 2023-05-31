<?php 
include '../koneksi.php';
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tempatlahir = $_POST['tempatlahir'];
$kategori = $_POST['kategori'];
$tgllahir = $_POST['tgllahir'];
$waktu_pelaksanaan = $_POST['waktu_pelaksanaan'];
$tempat_pelaksanaan = $_POST['tempat_pelaksanaan'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf', 'png');
$filename = $_FILES['trnfoto']['name'];

INSERT INTO `karyawan`(`Id_karyawan`, `No_induk_karyawan`, `Nama`, `Tempat_lahir`, `Tgl_lahir`, `Foto`, `Id_jabatan`, `Id_unit_kerja`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')

mysqli_query($koneksi, "insert into surat_masuk VALUES (NULL, '$no_suratmasuk','$no_surat', '$tanggal', '$perihal', '$terima_dari', '$isi', '$tanggal_diteruskan', '$catatan', '$kategori', '$tgl_pelaksanaan', '$waktu_pelaksanaan', '$tempat_pelaksanaan')") or die(mysqli_error($koneksi));
header("location: tambah_karyawan.php?alert=berhasil");