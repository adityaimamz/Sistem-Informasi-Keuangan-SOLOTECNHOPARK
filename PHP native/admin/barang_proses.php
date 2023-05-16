<?php 
include '../koneksi.php';
$nama_barang  = $_POST['nama_barang'];
$registrasi  = $_POST['registrasi'];
$nama_gedung  = $_POST['nama_gedung'];
$nama_ruangan_area  = $_POST['nama_ruangan_area'];
$tanggal_masuk  = $_POST['tanggal_masuk'];
$tanggal_keluar  = $_POST['tanggal_keluar'];
$tanggal_barang  = $_POST['tanggal_barang'];
$jenis_merk_tipe  = $_POST['jenis_merk_tipe'];
$kode_label_stp  = $_POST['kode_label_stp'];
$kode_label_pemkot  = $_POST['kode_label_pemkot'];
$jumlah_barang =  $_POST['jumlah_barang'];
$catatan =  $_POST['catatan'];
$kondisi_barang =  $_POST['kondisi_barang'];
$drive =  $_POST['drive'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf','png');
$filename = $_FILES['gambar']['name'];


if($filename == ""){
// 	mysqli_query($koneksi, "INSERT INTO master_barang VALUES (NULL, '$nama_barang', '$nama_gedung', '$nama_ruangan_area', '$tanggal_masuk', '$tanggal_keluar', '$jenis_merk_tipe', '$kode_label_stp', '$kode_label_pemkot', '$jumlah_barang', '', '$drive', '$kondisi_barang','$catatan')") or die(mysqli_error($koneksi));
// 	header("location:barang.php?alert=berhasil");

    $query = sprintf("INSERT INTO master_barang VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '', '%s', '%s', '%s')",
        mysqli_real_escape_string($koneksi, $nama_barang),
        mysqli_real_escape_string($koneksi, $registrasi),
        mysqli_real_escape_string($koneksi, $nama_gedung),
        mysqli_real_escape_string($koneksi, $nama_ruangan_area),
        mysqli_real_escape_string($koneksi, $tanggal_masuk),
        mysqli_real_escape_string($koneksi, $tanggal_keluar),
        mysqli_real_escape_string($koneksi, $tanggal_barang),
        mysqli_real_escape_string($koneksi, $jenis_merk_tipe),
        mysqli_real_escape_string($koneksi, $kode_label_stp),
        mysqli_real_escape_string($koneksi, $kode_label_pemkot),
        mysqli_real_escape_string($koneksi, $jumlah_barang),
        mysqli_real_escape_string($koneksi, $drive),
        mysqli_real_escape_string($koneksi, $kondisi_barang),
        mysqli_real_escape_string($koneksi, $catatan));
    
    mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    header("location:barang.php?alert=berhasil");

}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:barang.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['gambar']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "INSERT INTO master_barang VALUES (NULL, '$nama_barang',$registrasi, '$nama_gedung', '$nama_ruangan_area', '$tanggal_masuk', '$tanggal_keluar', '$jenis_merk_tipe', '$kode_label_stp', '$kode_label_pemkot', '$jumlah_barang', '$file_gambar', '$drive', '$kondisi_barang','$catatan')");
		header("location:barang.php?alert=berhasil");
	}
}