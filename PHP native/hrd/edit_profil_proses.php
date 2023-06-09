<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tempatlahir = $_POST['tempatlahir'];
$tgllahir = $_POST['tgllahir'];
$jabatan = $_POST['jabatan'];
$unit = $_POST['unit'];

$rand = rand();
$allowed =  array('jpg','jpeg','PNG', 'png');
$filename = $_FILES['trnfoto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename == ""){
    mysqli_query($koneksi, "update karyawan set No_induk_karyawan='$nik',Nama='$nama', Tempat_lahir='$tempatlahir', Tgl_lahir='$tgllahir', Id_jabatan='$jabatan', Id_unit_kerja='$unit' where Id_karyawan='$id'") or die(mysqli_error($koneksi));
    header("location:edit_karyawan_jabatan.php?alert=berhasilupdate&id=" . urlencode($id));
	// header("location:edit_jabatan.php?alert=berhasilupdate");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:edit_karyawan.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$xgambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "update karyawan set No_induk_karyawan='$nik', Nama='$nama', Tempat_lahir='$tempatlahir', Tgl_lahir='$tgllahir', Foto='$xgambar', Id_jabatan='$jabatan', Id_unit_kerja='$unit' where Id_karyawan='$id'");
		header("location:edit_karyawan_jabatan.php?alert=berhasilupdate&id=" . urlencode($id));
	}
}