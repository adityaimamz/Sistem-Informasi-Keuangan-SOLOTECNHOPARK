<?php 
include '../koneksi.php';
$id = $_POST['id'];
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

mysqli_query($koneksi, "UPDATE master_agenda SET Tanggal='$tanggal', Pukul='$pukul', Acara='$acara', Instansi='$instansi', Tempat='$tempat', Perihal='$perihal', Status='$status', Jumlah_pengunjung='$jumlah_pengunjung', Keterangan='$keterangan', Id_pegawai='$pegawai' WHERE Id_agenda='$id'") or die(mysqli_error($koneksi));
header("location:agenda.php?alert=berhasilupdate");
?> 