<?php 
session_start();
include '../koneksi.php';
$tanggal  = $_POST['tanggal'];
$bulan  = $_POST['bulan'];
$No_tandaterima  = $_POST['No_tandaterima'];
$metode  = $_POST['metode'];
$nama  = $_POST['nama'];
$alamat  = $_POST['alamat'];
$keperluan  = $_POST['keperluan'];
$nominal  = $_POST['nominal'];
// $status = $_POST['status'];
$drive = $_POST['drive'];
// $kode = $_POST['kode'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf', 'png');
$filename = $_FILES['trnfoto']['name'];

// $kode_penerimaan = "PNR" . date("YmdHis");

if($filename == ""){
	if($No_tandaterima == "" && $metode == ""){
// 	    mysqli_query($koneksi, "insert into master_penerimaan values (NULL,'','$bulan','$tanggal','$nama','$keperluan','$alamat', 'NULL', '$nominal', '','','invoice', '$drive','nonverifikasi')")or die(mysqli_error($koneksi));
// 		header("location:tagihan.php?alert=berhasil");

		mysqli_query($koneksi, sprintf("insert into master_penerimaan values (NULL,'','%s','%s','%s','%s','%s', 'NULL', '%f', 'NULL','','invoice', '%s','nonverifikasi')",
		mysqli_real_escape_string($koneksi, $bulan),
		mysqli_real_escape_string($koneksi, $tanggal),
		mysqli_real_escape_string($koneksi, $nama),
		mysqli_real_escape_string($koneksi, $keperluan),
		mysqli_real_escape_string($koneksi, $alamat),
		$nominal,
		mysqli_real_escape_string($koneksi, $drive))) or die(mysqli_error($koneksi));
		
		header("location:tagihan.php?alert=berhasil");

	}else{
// 		mysqli_query($koneksi, "insert into master_penerimaan values (NULL,'','$bulan','$tanggal','$nama','$keperluan','$alamat', '$No_tandaterima', '$nominal', '$metode','','voice', '$drive','nonverifikasi')")or die(mysqli_error($koneksi));
// 		header("location:penerimaan.php?alert=berhasil");
		
		$query = sprintf("INSERT INTO master_penerimaan VALUES (NULL,'','%s','%s','%s','%s','%s', '%s', '%f', '%d', '', 'voice', '%s', 'nonverifikasi')",
                  mysqli_real_escape_string($koneksi, $bulan),
                  mysqli_real_escape_string($koneksi, $tanggal),
                  mysqli_real_escape_string($koneksi, $nama),
                  mysqli_real_escape_string($koneksi, $keperluan),
                  mysqli_real_escape_string($koneksi, $alamat),
                  mysqli_real_escape_string($koneksi, $No_tandaterima),
                  $nominal,
                  $metode,
                  mysqli_real_escape_string($koneksi, $drive));
        mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        header("location:penerimaan.php?alert=berhasil");

	}
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:penerimaan.php?alert=gagal");
	}elseif($No_tandaterima == "" && $metode == ""){
// 		mysqli_query($koneksi, "insert into master_penerimaan values (NULL,'','$bulan','$tanggal','$nama','$keperluan','$alamat','NULL', '$nominal', 'NULL','$file_gambar','invoice', '$drive','nonverifikasi')");
// 		header("location:tagihan.php?alert=berhasil");
		
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		$query = sprintf("INSERT INTO master_penerimaan VALUES (NULL,'','%s','%s','%s','%s','%s','NULL', '%f', NULL,'%s','invoice', '%s','nonverifikasi')",
            mysqli_real_escape_string($koneksi, $bulan),
            mysqli_real_escape_string($koneksi, $tanggal),
            mysqli_real_escape_string($koneksi, $nama),
            mysqli_real_escape_string($koneksi, $keperluan),
            mysqli_real_escape_string($koneksi, $alamat),
            mysqli_real_escape_string($koneksi, $nominal),
            mysqli_real_escape_string($koneksi, $file_gambar),
            mysqli_real_escape_string($koneksi, $drive)
        );
        
        mysqli_query($koneksi, $query);
        header("location:tagihan.php?alert=berhasil");


	}else{
// 	    mysqli_query($koneksi, "insert into master_penerimaan values (NULL,'','$bulan','$tanggal','$nama','$keperluan','$alamat','$No_tandaterima', '$nominal', '$metode','$file_gambar','voice', '$drive','nonverifikasi')");
// 		header("location:penerimaan.php?alert=berhasil");
		
	    move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		$query = sprintf("insert into master_penerimaan values (NULL,'','%s','%s','%s','%s','%s','%s','%f','%d','%s','voice','%s','nonverifikasi')",
                 mysqli_real_escape_string($koneksi, $bulan),
                 mysqli_real_escape_string($koneksi, $tanggal),
                 mysqli_real_escape_string($koneksi, $nama),
                 mysqli_real_escape_string($koneksi, $keperluan),
                 mysqli_real_escape_string($koneksi, $alamat),
                 mysqli_real_escape_string($koneksi, $No_tandaterima),
                 $nominal,
                 $metode,
                 mysqli_real_escape_string($koneksi, $file_gambar),
                 mysqli_real_escape_string($koneksi, $drive));

        mysqli_query($koneksi, $query);
        header("location:penerimaan.php?alert=berhasil");

	}
}

//status
if(isset($_GET['status']) && isset($_GET['id'])) {
	$id = $_GET['id'];
	
	if($_GET['status']=='n'){
		$status="invoice";
	}else{
		$status="voice";
	}
	
	mysqli_query($koneksi, "UPDATE master_penerimaan SET Status='$status' where Id_penerimaan='$id'") or die(mysqli_error($koneksi));
	header("location:penerimaan.php?alert=berhasilupdate");
}
//akhir aktif


?>