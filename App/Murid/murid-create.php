<?php
include "../../connection.php";

$kode_murid = htmlspecialchars($_POST['kode_murid']);
$nama_murid = htmlspecialchars($_POST['nama_murid']);
$no_hp = htmlspecialchars($_POST['no_hp']);
$tanggal_masuk = htmlspecialchars($_POST['tanggal_masuk']);
$asal_sekolah = htmlspecialchars($_POST['asal_sekolah']);

$cek = mysqli_query(
    $connect,
    "SELECT * FROM murid WHERE kode_murid='$kode_murid'"
);

if(mysqli_num_rows($cek) == 0) {
    $sql = "INSERT INTO murid (kode_murid, nama_murid, no_hp, tanggal_masuk, asal_sekolah)
            VALUES ( '$kode_murid','$nama_murid','$no_hp', '$tanggal_masuk', '$asal_sekolah' )";
    mysqli_query($connect, $sql);
    $pesan = "Murid berhasil ditambahkan";
    $location = "location='../../index.php?menu=murid';";
} else {
    $pesan = "Kode murid sudah digunakan";
    $location = "history.back();";
}
?>

<script>
alert('<?= $pesan; ?>');
<?= $location; ?>
</script>
