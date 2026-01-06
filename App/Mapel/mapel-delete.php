<?php
include "../../connection.php";
$kode_mapel = htmlspecialchars($_GET['id']);
$sql = "SELECT * FROM mapel WHERE kode_mapel='$kode_mapel'";
$qry = mysqli_query($connect, $sql);
$row = mysqli_num_rows($qry);

if($row == 1) {
    mysqli_query($connect, "DELETE FROM mapel WHERE kode_mapel='$kode_mapel'");
    $pesan = "Data mapel berhasil dihapus";
    $location = "location='../../index.php?menu=mapel';";
} else {
    $pesan = "Maaf mapel tidak ditemukan";
    $location = "history.back();";
}
?>

<script>
alert('<?=$pesan;?>');
<?=$location;?>
</script>
