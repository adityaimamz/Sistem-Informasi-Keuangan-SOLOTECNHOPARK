<?php 
include '../koneksi.php';
$id = $_POST['id'];
$no_suratmasuk = $_POST['no_suratmasuk'];
$no_surat = $_POST['nomor_surat'];
$tanggal = $_POST['tanggal'];
$perihal = $_POST['perihal'];
$terima_dari = $_POST['terima_dari'];
$isi = $_POST['isi'];
$tanggal_diteruskan = $_POST['tanggal_diteruskan'];
$catatan = $_POST['catatan'];
$kategori = $_POST['kategori'];
$tgl_pelaksanaan = $_POST['tgl_pelaksanaan'];
$waktu_pelaksanaan = $_POST['waktu_pelaksanaan'];
$tempat_pelaksanaan = $_POST['tempat_pelaksanaan'];

mysqli_query($koneksi, "UPDATE surat_masuk SET No_Suratmasuk='$no_suratmasuk', Nomor_surat='$no_surat', Tanggal='$tanggal', Perihal='$perihal', Terima_dari='$terima_dari', Isi='$isi', Tanggal_diteruskan='$tanggal_diteruskan', Catatan='$catatan', Kategori='$kategori', Tgl_pelaksanaan='$tgl_pelaksanaan', Waktu_pelaksanaan='$waktu_pelaksanaan', Tempat_pelaksanaan='$tempat_pelaksanaan' WHERE Id_Suratmasuk='$id'") or die(mysqli_error($koneksi));
header("location: surat_masuk.php?alert=berhasilupdate");
?>