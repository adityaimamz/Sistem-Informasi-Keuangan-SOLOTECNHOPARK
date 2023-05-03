<?php 
include '../koneksi.php';
$id = $_POST['id'];
$tanggal = $_POST['tanggal'];
$pukul = $_POST['pukul'];
$acara = $_POST['acara'];
$instansi = $_POST['instansi'];
$tempat = $_POST['tempat'];
$perihal = $_POST['perihal'];
$jumlah_pengunjung = $_POST['jumlah_pengunjung'];
$keterangan = $_POST['keterangan'];
$pic = $_POST['pic'];

mysqli_query($koneksi, "UPDATE master_agenda SET Tanggal='$tanggal', Pukul='$pukul', Acara='$acara', Instansi='$instansi', Tempat='$tempat', Perihal='$perihal', Jumlah_pengunjung='$jumlah_pengunjung', Keterangan='$keterangan', Pic='$pic'") or die(mysqli_error($koneksi));
header("location:agenda.php?alert=berhasilupdate");
?> 
