<?php
include "../../connection.php";

$tanggal = $_POST['tanggal'];
$kode_murid = $_POST['kode_murid'];
$tingkat = $_POST['tingkat'];
$biaya = $_POST['biaya'];
$status = $_POST['status'];

$cek = mysqli_query($connect, "
    SELECT 1 FROM spp 
    WHERE kode_murid='$kode_murid' 
    AND tanggal='$tanggal'
");

if(mysqli_num_rows($cek) > 0){
    echo "<script>
        alert('SPP murid ini pada tanggal tersebut sudah ada');
        history.back();
    </script>";
    exit;
}

$sql = "INSERT INTO spp 
        (tanggal, kode_murid, tingkat, biaya, status)
        VALUES
        ('$tanggal', '$kode_murid', '$tingkat', '$biaya', '$status')";
mysqli_query($connect, $sql);
header("Location: ../../index.php?menu=spp&aksi=read");
