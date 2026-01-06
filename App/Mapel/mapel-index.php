<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
if ($aksi == "tambah") { include "mapel-tambah.php"; }
else if ($aksi == "edit") { include "mapel-edit.php"; }
else { include "mapel-read.php"; }
?>
