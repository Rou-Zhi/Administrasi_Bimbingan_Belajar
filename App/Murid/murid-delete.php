<?php
include "../../connection.php";
$kode_murid = htmlspecialchars($_GET['id']);
$sql = "SELECT * FROM murid WHERE kode_murid='$kode_murid'";
$qry = mysqli_query($connect, $sql);
$row = mysqli_num_rows($qry);

if($row == 1) {
    mysqli_query($connect, "DELETE FROM murid WHERE kode_murid='$kode_murid'");
    $pesan = "Data murid berhasil dihapus";
    $location = "location='../../index.php?menu=murid';";
} else {
    $pesan = "Maaf murid tidak ditemukan";
    $location = "history.back();";
}
?>

<script>
alert('<?=$pesan;?>');
<?=$location;?>
</script>
