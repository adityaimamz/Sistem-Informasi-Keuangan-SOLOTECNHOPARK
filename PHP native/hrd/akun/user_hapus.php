<?php 
include '../../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "delete from master_user where Id_user='$id'");
header("location:user.php");
