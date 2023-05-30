<?php 
include '../koneksi.php';
$id = $_POST['id'];
$tanggalmulai = $_POST['tanggal_mulai'];
$tanggalakhir = $_POST['tanggal_selesai'];
$pukul = $_POST['pukul'];
$acara = $_POST['acara'];
$instansi = $_POST['instansi'];
$tempat = $_POST['tempat'];
$perihal = $_POST['perihal'];
$jumlah_pengunjung = $_POST['jumlah_pengunjung'];
$keterangan = $_POST['keterangan'];
$pic = $_POST['pic'];

mysqli_query($koneksi, "UPDATE master_agenda SET Tanggal='$tanggalmulai',Tanggal_selesai='$tanggalakhir', Pukul='$pukul', Acara='$acara', Instansi='$instansi', Tempat='$tempat', Perihal='$perihal', Jumlah_pengunjung='$jumlah_pengunjung', Id_keterangan='$keterangan', Pic='$pic' WHERE Id_agenda='$id'") or die(mysqli_error($koneksi));
header("location:agenda.php?alert=berhasilupdate");
?> 