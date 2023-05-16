<?php 
include '../koneksi.php';
$tanggal = $_POST['tanggal'];
$pukul = $_POST['pukul'];
$acara = $_POST['acara'];
$instansi = $_POST['instansi'];
$tempat = $_POST['tempat'];
$perihal = $_POST['perihal'];
$jumlah_pengunjung = $_POST['jumlah_pengunjung'];
$keterangan = $_POST['keterangan'];
$pic = $_POST['pic'];

mysqli_query($koneksi, "insert into master_agenda values (NULL,'$tanggal', '$pukul', '$acara', '$instansi', '$tempat', '$perihal', '$jumlah_pengunjung', '$keterangan', '$pic')") or die(mysqli_error($koneksi));
header("location:agenda.php?alert=berhasil");