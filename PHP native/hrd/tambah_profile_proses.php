<?php 
include '../koneksi.php';
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tempatlahir = $_POST['tempatlahir'];
$kategori = $_POST['kategori'];
$tgllahir = $_POST['tgllahir'];
$jabatan = $_POST['jabatan'];
$unit = $_POST['unit'];

$rand = rand();
$allowed =  array('jpg','jpeg','png');
$filename = $_FILES['trnfoto']['name'];

if($filename == ""){
    mysqli_query($koneksi, "insert into master_penerimaan values (NULL,'','$bulan','$tanggal','$nama','$keperluan','$alamat', 'NULL', '$nominal', '','','invoice', '$drive','nonverifikasi')")or die(mysqli_error($koneksi));
    header("location:tagihan.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:penerimaan.php?alert=gagal");
	}elseif($No_tandaterima == "" && $metode == ""){
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into master_penerimaan values (NULL,'','$bulan','$tanggal','$nama','$keperluan','$alamat','NULL', '$nominal', 'NULL','$file_gambar','invoice', '$drive','nonverifikasi')");
		header("location:tagihan.php?alert=berhasil");
	}else{
	    move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into master_penerimaan values (NULL,'','$bulan','$tanggal','$nama','$keperluan','$alamat','$No_tandaterima', '$nominal', '$metode','$file_gambar','voice', '$drive','nonverifikasi')");
		header("location:penerimaan.php?alert=berhasil");
	}
}

INSERT INTO `karyawan`(`Id_karyawan`, `No_induk_karyawan`, `Nama`, `Tempat_lahir`, `Tgl_lahir`, `Foto`, `Id_jabatan`, `Id_unit_kerja`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')

mysqli_query($koneksi, "insert into surat_masuk VALUES (NULL, '$no_suratmasuk','$no_surat', '$tanggal', '$perihal', '$terima_dari', '$isi', '$tanggal_diteruskan', '$catatan', '$kategori', '$tgl_pelaksanaan', '$waktu_pelaksanaan', '$tempat_pelaksanaan')") or die(mysqli_error($koneksi));
header("location: tambah_karyawan.php?alert=berhasil");