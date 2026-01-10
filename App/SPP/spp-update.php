<?php
include '../../connection.php';

$id      = $_POST['id_spp'];
$tanggal = $_POST['tanggal'];
$tingkat = $_POST['tingkat'];
$biaya   = $_POST['biaya'];
$status  = $_POST['status'];

$sql = "UPDATE spp SET
            tanggal = '$tanggal',
            tingkat = '$tingkat',
            biaya   = '$biaya',
            status  = '$status'
        WHERE id_spp = '$id'";

$query = mysqli_query($connect, $sql);

if ($query) {
    echo "<script>alert('Data SPP berhasil diupdate');window.location='../../index.php?menu=spp&aksi=read';</script>";
} else {
    echo "<script>alert('Gagal mengupdate data');history.back();</script>";
}
