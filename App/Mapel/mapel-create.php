<?php
include "../../connection.php";

$kode_mapel = htmlspecialchars($_POST['kode_mapel']);
$nama_mapel = htmlspecialchars($_POST['nama_mapel']);
$tingkat    = htmlspecialchars($_POST['tingkat']);
$tarif      = $_POST['tarif'] !== "" ? (int)$_POST['tarif'] : NULL;

$cek = mysqli_query(
    $connect,
    "SELECT * FROM mapel WHERE kode_mapel='$kode_mapel'"
);

if(mysqli_num_rows($cek) == 0) {
    $sql = "INSERT INTO mapel (kode_mapel, nama_mapel, tingkat, tarif)
            VALUES ( '$kode_mapel','$nama_mapel','$tingkat',".($tarif === NULL ? "NULL" : $tarif)." )";
    mysqli_query($connect, $sql);
    $pesan = "Mata pelajaran berhasil ditambahkan";
    $location = "location='../../index.php?menu=mapel';";
} else {
    $pesan = "Kode mapel sudah digunakan";
    $location = "history.back();";
}
?>

<script>
alert('<?= $pesan; ?>');
<?= $location; ?>
</script>
