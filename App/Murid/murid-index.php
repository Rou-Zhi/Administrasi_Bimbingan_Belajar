<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
if ($aksi == "tambah") { include "murid-tambah.php"; }
else if ($aksi == "edit") { include "murid-edit.php"; }
else { include "murid-read.php"; }
?>
