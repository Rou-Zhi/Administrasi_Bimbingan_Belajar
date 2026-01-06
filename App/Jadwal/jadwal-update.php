<?php
include "../../connection.php";

$kode_jadwal = htmlspecialchars($_POST['kode_jadwal']);
$hari = htmlspecialchars($_POST['hari']);
$jam = htmlspecialchars($_POST['jam']);
$kode_pengajar = htmlspecialchars($_POST['kode_pengajar']);
$kode_mapel = htmlspecialchars($_POST['kode_mapel']);
$tempat = htmlspecialchars($_POST['tempat']);

$sql = "UPDATE jadwal SET
        hari='$hari',
        jam='$jam',
        kode_pengajar='$kode_pengajar',
        kode_mapel='$kode_mapel',
        tempat='$tempat'
        WHERE kode_jadwal='$kode_jadwal'";

if(mysqli_query($connect, $sql)){
    echo "<script>
    alert('Data Jadwal berhasil diperbarui');
    location='../../index.php?menu=jadwal';
    </script>";
} else {
    echo "<script>
    alert('Terjadi kesalahan: " . mysqli_error($connect) . "');
    history.back();
    </script>";
}
?>
