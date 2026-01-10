<?php
require_once '../../connection.php';

if (!isset($_GET['id'])) {
    echo "<script>
        alert('ID SPP tidak ditemukan');
        window.location='../../index.php?menu=spp&aksi=read';
    </script>";
    exit;
}

$id = mysqli_real_escape_string($connect, $_GET['id']);
$cek = mysqli_query($connect, "SELECT status FROM spp WHERE id_spp = '$id'");
$data = mysqli_fetch_assoc($cek);

if (!$data) {
    echo "<script>
        alert('Data SPP tidak ditemukan');
        window.location='../../index.php?menu=spp&aksi=read';
    </script>";
    exit;
}

if ($data['status'] == 1) {
    echo "<script>
        alert('SPP yang sudah LUNAS tidak boleh dihapus');
        window.location='../../index.php?menu=spp&aksi=read';
    </script>";
    exit;
}

$delete = mysqli_query($connect, "DELETE FROM spp WHERE id_spp = '$id'");
if ($delete) {
    echo "<script>
        alert('Data SPP berhasil dihapus');
        window.location='../../index.php?menu=spp&aksi=read';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus data SPP');
        window.location='../../index.php?menu=spp&aksi=read';
    </script>";
}
