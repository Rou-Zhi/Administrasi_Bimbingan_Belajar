<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
if ($aksi == "tambah") { include "spp-tambah.php"; }
else if ($aksi == "edit") { include "spp-edit.php"; }
else { include "spp-read.php"; }
?>
