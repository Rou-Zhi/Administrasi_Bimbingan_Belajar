<?php
include '../../connection.php';
$id = $_GET['id'] ?? null;

if(!$id){
    echo "<script>alert('ID absensi tidak ditemukan'); window.location='../../index.php?menu=absensi';</script>";
    exit;
}

$sql = "UPDATE absensi SET konfirmasi='1' WHERE id_absensi='$id'";
if(mysqli_query($connect, $sql)){
    echo "<script>alert('Absensi berhasil dikonfirmasi'); window.location='../../index.php?menu=absensi';</script>";
} else {
    echo "<script>alert('Gagal mengonfirmasi absensi'); window.location='../../index.php?menu=absensi';</script>";
}
?>
