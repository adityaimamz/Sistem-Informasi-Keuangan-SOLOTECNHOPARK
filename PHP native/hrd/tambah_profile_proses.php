<?php 
include '../koneksi.php';
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tempatlahir = $_POST['tempatlahir'];
$tgllahir = $_POST['tgllahir'];
$jabatan = $_POST['jabatan'];
$unit = $_POST['unit'];

$rand = rand();
$allowed =  array('jpg','jpeg','png', 'PNG');
$filename = $_FILES['trnfoto']['name'];

if($filename == ""){
    mysqli_query($koneksi, "insert into karyawan values ('NULL','$nik','$nama','$tempatlahir','$tgllahir','','$jabatan','$unit')")or die(mysqli_error($koneksi));
    header("location:tambah_karyawan_jabatan.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:tambah_karyawan.php?alert=gagal");
	}else{
	    move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into karyawan values ('NULL','$nik','$nama','$tempatlahir','$tgllahir','$file_gambar','$jabatan','$unit')")or die(mysqli_error($koneksi));
		header("location:tambah_karyawan_jabatan.php?alert=berhasil");
	}
}