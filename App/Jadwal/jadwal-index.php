<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
if ($aksi == "tambah") { include "jadwal-tambah.php"; }
else if ($aksi == "edit") { include "jadwal-edit.php"; }
else { include "jadwal-read.php"; }
?>
