<?php 
include '../koneksi.php';
$tanggal  = $_POST['tanggal'];
$bulan  = $_POST['bulan'];
$divisi  = $_POST['divisi'];
$jenis  = $_POST['jenis'];
$rincian  = $_POST['rincian'];
$jumlah  = $_POST['jumlah'];
$sumberdana  = $_POST['sumberdana'];
$kode_pengeluaran = $_POST['kode_pengeluaran'];
$drive  = $_POST['drive'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf','png');
$filename = $_FILES['trnfoto']['name'];
// membuat kode pengeluaran unik

if($filename == ""){
// 	mysqli_query($koneksi, "insert into master_pengeluaran values (NULL, '$kode_pengeluaran', '$sumberdana','$divisi','$jenis','$tanggal','$bulan','$rincian','$jumlah','', '$drive', 'nonverifikasi')")or die(mysqli_error($koneksi));
// 	header("location:pengeluaran.php?alert=berhasil");
	
	mysqli_query($koneksi, sprintf("insert into master_pengeluaran values (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '', '%s', 'nonverifikasi')",
        mysqli_real_escape_string($koneksi, $kode_pengeluaran),
        mysqli_real_escape_string($koneksi, $sumberdana),
        mysqli_real_escape_string($koneksi, $divisi),
        mysqli_real_escape_string($koneksi, $jenis),
        mysqli_real_escape_string($koneksi, $tanggal),
        mysqli_real_escape_string($koneksi, $bulan),
        mysqli_real_escape_string($koneksi, $rincian),
        mysqli_real_escape_string($koneksi, $jumlah),
        mysqli_real_escape_string($koneksi, $drive))) or die(mysqli_error($koneksi));

    header("location:pengeluaran.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:pengeluaran.php?alert=gagal");
	}else{
// 		mysqli_query($koneksi, "insert into master_pengeluaran values (NULL, '$kode_pengeluaran', '$sumberdana','$divisi','$jenis','$tanggal','$bulan','$rincian','$jumlah', '$file_gambar', '$drive', 'nonverifikasi')");
// 		header("location:pengeluaran.php?alert=berhasil");
		
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		$query = sprintf("INSERT INTO master_pengeluaran (Kode_pengeluaran, Id_sumberdana, Id_divisi, Id_jenis, Tanggal, Bulan, Rincian, Jumlah, Bukti_lpj, Drive, Status) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', 'nonverifikasi')",
            mysqli_real_escape_string($koneksi, $kode_pengeluaran),
            mysqli_real_escape_string($koneksi, $sumberdana),
            mysqli_real_escape_string($koneksi, $divisi),
            mysqli_real_escape_string($koneksi, $jenis),
            mysqli_real_escape_string($koneksi, $tanggal),
            mysqli_real_escape_string($koneksi, $bulan),
            mysqli_real_escape_string($koneksi, $rincian),
            mysqli_real_escape_string($koneksi, $jumlah),
            mysqli_real_escape_string($koneksi, $file_gambar),
            mysqli_real_escape_string($koneksi, $drive));
    
        mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        header("location:pengeluaran.php?alert=berhasil");

	}
}

// mysqli_query($koneksi, "insert into master_pengeluaran values (NULL, '$sumberdana','$divisi','$jenis','$tanggal','$bulan','$rincian','$jumlah')")or die(mysqli_error($koneksi));
// header("location:pengeluaran.php?alert=berhasil");