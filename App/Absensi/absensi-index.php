<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
if ($aksi == "tambah") { include "absensi-tambah.php"; }
else if ($aksi == "edit") { include "absensi-edit.php"; }
else { include "absensi-read.php"; }
?>
