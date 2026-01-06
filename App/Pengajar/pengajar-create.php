<?php
include "../../connection.php";

$kode_pengajar = htmlspecialchars($_POST['kode_pengajar']);
$nama_pengajar = htmlspecialchars($_POST['nama_pengajar']);
$no_hp    = htmlspecialchars($_POST['no_hp']);

$cek = mysqli_query(
    $connect,
    "SELECT * FROM pengajar WHERE kode_pengajar='$kode_pengajar'"
);

if(mysqli_num_rows($cek) == 0) {
    $sql = "INSERT INTO pengajar (kode_pengajar, nama_pengajar, no_hp)
            VALUES ( '$kode_pengajar','$nama_pengajar','$no_hp' )";
    mysqli_query($connect, $sql);
    $pesan = "Pengajar berhasil ditambahkan";
    $location = "location='../../index.php?menu=pengajar';";
} else {
    $pesan = "Kode pengajar sudah digunakan";
    $location = "history.back();";
}
?>

<script>
alert('<?= $pesan; ?>');
<?= $location; ?>
</script>
