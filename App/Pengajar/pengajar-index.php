<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
if ($aksi == "tambah") { include "pengajar-tambah.php"; }
else if ($aksi == "edit") { include "pengajar-edit.php"; }
else { include "pengajar-read.php"; }
?>
