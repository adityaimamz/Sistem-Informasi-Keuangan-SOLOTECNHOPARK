<?php 
include '../koneksi.php';
$id = $_POST['id'];
$idk = $_POST['idk'];

$rand = rand();
$allowed = array('jpg','jpeg','PNG', 'png');
$filename = $_FILES['trnfoto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename != ""){
    if (!in_array($ext, $allowed)) {
        header("location:index.php?alert=gagal");
        exit();
    }

    move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
    $xgambar = $rand.'_'.$filename;
    mysqli_query($koneksi, "UPDATE riwayat_pendidikan SET Ijazah='$xgambar' WHERE Id_pendidikan='$id'");
}

header("location:index.php?alert=berhasilupdate&id=" . urlencode($idk));
?>
