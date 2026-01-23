<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
if ($aksi == "tambah") { include "admin-tambah.php"; }
else if ($aksi == "edit") { include "admin-edit.php"; }
else { include "admin-read.php"; }
?>
