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

	if($data['Level'] == "Administrator"){
		$_SESSION['status'] = "administrator_logedin";
		header("location:admin/");
	}else if($data['Level'] == "Manager"){
		$_SESSION['status'] = "manager_logedin";
		header("location:manager/");
	}else if($data['Level'] == "Kesekretariatan"){
		$_SESSION['status'] = "Kesekretariatan_logedin";
		header("location:kesekretariatan/");
	}else if($data['Level'] == "Verifikator"){
		$_SESSION['status'] = "verifikator_logedin";
		header("location:verifikator/");
	}else if($data['Level'] == "Barang"){
		$_SESSION['status'] = "barang_logedin";
		header("location:barang/");
	}else if($data['Level'] == "Hrd"){
		$_SESSION['status'] = "hrd_logedin";
		header("location:hrd/");
	}else{
		header("location:login.php?alert=gagal");
	}
}else{
	header("location:login.php?alert=gagal");
}
