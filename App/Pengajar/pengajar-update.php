<?php
include "../../connection.php";

$kode_pengajar = $_POST['kode_pengajar']; 
$nama_pengajar = mysqli_real_escape_string($connect, $_POST['nama_pengajar']);
$no_hp = mysqli_real_escape_string($connect, $_POST['no_hp']);

$sql = "UPDATE pengajar SET
        nama_pengajar='$nama_pengajar',
        no_hp='$no_hp'
        WHERE kode_pengajar='$kode_pengajar'";

if(mysqli_query($connect, $sql)){
    echo "<script>
    alert('Data pengajar berhasil diperbarui');
    location='../../index.php?menu=pengajar';
    </script>";
} else {
    echo "<script>
    alert('Terjadi kesalahan: " . mysqli_error($connect) . "');
    history.back();
    </script>";
}
?>
