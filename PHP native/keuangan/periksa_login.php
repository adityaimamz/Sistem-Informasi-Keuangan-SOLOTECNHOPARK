<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM master_user WHERE Username='$username' AND Password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);
	$_SESSION['id'] = $data['Id_user'];
	$_SESSION['nama'] = $data['Nama'];
	$_SESSION['username'] = $data['Username'];
	$_SESSION['level'] = $data['Level'];

	if($data['Level'] == "admin"){
		$_SESSION['status'] = "administrator_logedin";
		header("location:admin/");
	}else if($data['Level'] == "manager"){
		$_SESSION['status'] = "manajemen_logedin";
		header("location:manajemen/");
	}else{
		header("location:index.php?alert=gagal");
	}
}else{
	header("location:index.php?alert=gagal");
}
