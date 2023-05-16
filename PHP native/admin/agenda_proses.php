<?php 
include '../koneksi.php';
$tanggal = $_POST['tanggal'];
$pukul = $_POST['pukul'];
$acara = $_POST['acara'];
$instansi = $_POST['instansi'];
$tempat = $_POST['tempat'];
$perihal = $_POST['perihal'];
$status = $_POST['status'];
$jumlah_pengunjung = $_POST['jumlah_pengunjung'];
$keterangan = $_POST['keterangan'];
$pegawai = $_POST['pegawai'];

mysqli_query($koneksi, "insert into master_agenda values (NULL,'$tanggal', '$pukul', '$acara', '$instansi', '$tempat', '$perihal', '$status', '$jumlah_pengunjung', '$keterangan', '$pegawai')") or die(mysqli_error($koneksi));
header("location:agenda.php?alert=berhasil");