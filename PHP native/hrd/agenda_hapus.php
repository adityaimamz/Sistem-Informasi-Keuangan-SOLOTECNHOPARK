<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from master_agenda where Id_agenda='$id'");
header("location:agenda.php");