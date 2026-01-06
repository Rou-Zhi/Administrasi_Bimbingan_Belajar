<?php
include "../../connection.php";

$kode_mapel = $_POST['kode_mapel']; 
$nama       = mysqli_real_escape_string($connect, $_POST['nama_mapel']);
$tingkat    = mysqli_real_escape_string($connect, $_POST['tingkat']);
$tarif      = $_POST['tarif'] ?? null; 

$sql = "UPDATE mapel SET
        nama_mapel='$nama',
        tingkat='$tingkat',
        tarif=" . ($tarif === '' ? 'NULL' : $tarif) . "
        WHERE kode_mapel='$kode_mapel'";

if(mysqli_query($connect, $sql)){
    echo "<script>
    alert('Data mapel berhasil diperbarui');
    location='../../index.php?menu=mapel';
    </script>";
} else {
    echo "<script>
    alert('Terjadi kesalahan: " . mysqli_error($connect) . "');
    history.back();
    </script>";
}
?>
