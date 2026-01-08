<?php
include '../../connection.php';

if(!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID absensi tidak ditemukan'); window.location='../../index.php?menu=absensi';</script>";
    exit;
}

$id = mysqli_real_escape_string($connect, $_GET['id']);
$sql = "DELETE FROM absensi WHERE id_absensi = '$id'";
if(mysqli_query($connect, $sql)) {
    echo "<script>alert('Absensi berhasil dihapus'); window.location='../../index.php?menu=absensi';</script>";
} else {
    echo "<script>alert('Terjadi kesalahan: ".mysqli_error($connect)."'); window.location='../../index.php?menu=absensi';</script>";
}
?>