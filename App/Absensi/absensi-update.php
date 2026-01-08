<?php
include "../../connection.php";

$id_absensi  = $_POST['id_absensi'];
$tanggal     = $_POST['tanggal'];
$kode_jadwal = $_POST['kode_jadwal'];
$status      = $_POST['status'];
$konfirmasi  = $_POST['konfirmasi'];
$q = mysqli_query($connect, "
    SELECT jadwal.kode_pengajar, jadwal.kode_mapel, mapel.tarif
    FROM jadwal
    JOIN mapel ON jadwal.kode_mapel = mapel.kode_mapel
    WHERE jadwal.kode_jadwal = '$kode_jadwal'
");

if(mysqli_num_rows($q) == 0){
    echo "<script>alert('Jadwal tidak ditemukan');history.back();</script>";
    exit;
}

$data = mysqli_fetch_assoc($q);
$kode_pengajar = $data['kode_pengajar'];
$kode_mapel    = $data['kode_mapel'];
$tarif         = ($status === 'Hadir') ? $data['tarif'] : 0;

mysqli_query($connect, "
    UPDATE absensi SET
        tanggal     = '$tanggal',
        kode_jadwal = '$kode_jadwal',
        kode_pengajar = '$kode_pengajar',
        kode_mapel    = '$kode_mapel',
        tarif         = '$tarif',
        status        = '$status',
        konfirmasi    = '$konfirmasi'
    WHERE id_absensi = '$id_absensi'
");

echo "<script>
    alert('Absensi berhasil diperbarui');
    location='../../index.php?menu=absensi';
</script>";
