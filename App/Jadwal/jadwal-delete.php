<?php
include "../../connection.php";
$kode_jadwal = htmlspecialchars($_GET['id']);
$sql = "SELECT * FROM jadwal WHERE kode_jadwal='$kode_jadwal'";
$qry = mysqli_query($connect, $sql);
$row = mysqli_num_rows($qry);

if($row == 1) {
    mysqli_query($connect, "DELETE FROM jadwal WHERE kode_jadwal='$kode_jadwal'");
    $pesan = "Data mapel berhasil dihapus";
    $location = "location='../../index.php?menu=jadwal';";
} else {
    $pesan = "Maaf mapel tidak ditemukan";
    $location = "history.back();";
}
?>

<script>
alert('<?=$pesan;?>');
<?=$location;?>
</script>
