<?php
include "../../connection.php";

$kode_admin = $_POST['kode_admin']; 
$nama_admin = mysqli_real_escape_string($connect, $_POST['nama_admin']);
$email = mysqli_real_escape_string($connect, $_POST['email']);

$sql = "UPDATE admin SET
        nama_admin='$nama_admin',
        email='$email'
        WHERE kode_admin='$kode_admin'";

if(mysqli_query($connect, $sql)){
    echo "<script>
    alert('Data admin berhasil diperbarui');
    location='../../index.php?menu=admin';
    </script>";
} else {
    echo "<script>
    alert('Terjadi kesalahan: " . mysqli_error($connect) . "');
    history.back();
    </script>";
}
?>
