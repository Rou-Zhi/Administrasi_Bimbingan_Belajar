<?php
include "../../connection.php";

$kode_admin = htmlspecialchars($_POST['kode_admin']);
$nama_admin = htmlspecialchars($_POST['nama_admin']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

$cek = mysqli_query(
    $connect,
    "SELECT * FROM admin WHERE kode_admin='$kode_admin'"
);

if(mysqli_num_rows($cek) == 0) {
    $sql = "INSERT INTO admin (kode_admin, nama_admin, email, password)
            VALUES ( '$kode_admin','$nama_admin','$email', '$password' )";
    mysqli_query($connect, $sql);
    $pesan = "Admin berhasil ditambahkan";
    $location = "location='../../index.php?menu=admin';";
} else {
    $pesan = "Kode admin sudah digunakan";
    $location = "history.back();";
}
?>

<script>
alert('<?= $pesan; ?>');
<?= $location; ?>
</script>
