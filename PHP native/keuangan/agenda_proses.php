<?php 
include '../koneksi.php';
$tanggalmulai = $_POST['tanggal_mulai'];
$tanggalakhir = $_POST['tanggal_akhir'];
$pukul = $_POST['pukul'];
$acara = $_POST['acara'];
$instansi = $_POST['instansi'];
$tempat = $_POST['tempat'];
$perihal = $_POST['perihal'];
// $status = $_POST['status'];
$jumlah_pengunjung = $_POST['jumlah_pengunjung'];
$keterangan = $_POST['keterangan'];
$pic = $_POST['pic'];

mysqli_query($koneksi, "insert into master_agenda values (NULL,'$tanggalmulai','$tanggalakhir', '$pukul', '$acara', '$instansi', '$tempat', '$perihal', '$jumlah_pengunjung', '$keterangan', '$pic')") or die(mysqli_error($koneksi));
header("location:agenda.php?alert=berhasil");