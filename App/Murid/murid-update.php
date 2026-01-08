<?php
include "../../connection.php";

$kode_murid = $_POST['kode_murid']; 
$nama_murid = mysqli_real_escape_string($connect, $_POST['nama_murid']);
$no_hp = mysqli_real_escape_string($connect, $_POST['no_hp']);
$tanggal_masuk = mysqli_real_escape_string($connect, $_POST['tanggal_masuk']);
$asal_sekolah = mysqli_real_escape_string($connect, $_POST['asal_sekolah']);

$sql = "UPDATE murid SET
        nama_murid='$nama_murid',
        no_hp='$no_hp',
        tanggal_masuk='$tanggal_masuk',
        asal_sekolah='$asal_sekolah'
        WHERE kode_murid='$kode_murid'";

if(mysqli_query($connect, $sql)){
    echo "<script>
    alert('Data murid berhasil diperbarui');
    location='../../index.php?menu=murid';
    </script>";
} else {
    echo "<script>
    alert('Terjadi kesalahan: " . mysqli_error($connect) . "');
    history.back();
    </script>";
}
?>
