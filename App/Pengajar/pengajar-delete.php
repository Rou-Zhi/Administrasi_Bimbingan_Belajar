<?php
include "../../connection.php";
$kode_pengajar = htmlspecialchars($_GET['id']);
$sql = "SELECT * FROM pengajar WHERE kode_pengajar='$kode_pengajar'";
$qry = mysqli_query($connect, $sql);
$row = mysqli_num_rows($qry);

if($row == 1) {
    mysqli_query($connect, "DELETE FROM pengajar WHERE kode_pengajar='$kode_pengajar'");
    $pesan = "Data pengajar berhasil dihapus";
    $location = "location='../../index.php?menu=pengajar';";
} else {
    $pesan = "Maaf pengajar tidak ditemukan";
    $location = "history.back();";
}
?>

<script>
alert('<?=$pesan;?>');
<?=$location;?>
</script>
