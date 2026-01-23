<?php
include "../../connection.php";
$kode_admin = htmlspecialchars($_GET['id']);
$sql = "SELECT * FROM admin WHERE kode_admin='$kode_admin'";
$qry = mysqli_query($connect, $sql);
$row = mysqli_num_rows($qry);

if($row == 1) {
    mysqli_query($connect, "DELETE FROM admin WHERE kode_admin='$kode_admin'");
    $pesan = "Data admin berhasil dihapus";
    $location = "location='../../index.php?menu=admin';";
} else {
    $pesan = "Maaf admin tidak ditemukan";
    $location = "history.back();";
}
?>

<script>
alert('<?=$pesan;?>');
<?=$location;?>
</script>
