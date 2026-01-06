<?php
include "../../connection.php";

$kode_jadwal   = htmlspecialchars($_POST['kode_jadwal']);
$hari          = htmlspecialchars($_POST['hari']);
$jam           = htmlspecialchars($_POST['jam']);
$kode_pengajar = htmlspecialchars($_POST['kode_pengajar']);
$kode_mapel    = htmlspecialchars($_POST['kode_mapel']);
$tempat        = htmlspecialchars($_POST['tempat']);

$cek = mysqli_query(
    $connect,
    "SELECT 1 FROM jadwal WHERE kode_jadwal='$kode_jadwal'"
);

if(mysqli_num_rows($cek) == 0) {
    $sql = "INSERT INTO jadwal 
            (kode_jadwal, hari, jam, kode_pengajar, kode_mapel, tempat)
            VALUES
            ('$kode_jadwal','$hari','$jam','$kode_pengajar','$kode_mapel','$tempat')";
    mysqli_query($connect, $sql);
    $pesan = "Jadwal berhasil ditambahkan";
    $location = "location='../../index.php?menu=jadwal';";
} else {
    $pesan = "Kode jadwal sudah digunakan";
    $location = "history.back();";
}
?>

<script>
alert('<?= $pesan; ?>');
<?= $location; ?>
</script>
