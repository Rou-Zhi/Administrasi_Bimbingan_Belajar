<?php
include "../../connection.php";

$tanggal     = $_POST['tanggal'];
$kode_jadwal = $_POST['kode_jadwal'];
$status      = $_POST['status'];
$konfirmasi  = 'Belum';

$q = mysqli_query($connect, "
    SELECT
        jadwal.kode_pengajar,
        jadwal.kode_mapel,
        mapel.tarif
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

$cek = mysqli_query($connect, "
    SELECT 1 FROM absensi
    WHERE tanggal='$tanggal' AND kode_jadwal='$kode_jadwal'
");

if(mysqli_num_rows($cek) > 0){
    echo "<script>alert('Absensi untuk jadwal & tanggal ini sudah ada');history.back();</script>";
    exit;
}

mysqli_query($connect, "
    INSERT INTO absensi
    (tanggal, kode_jadwal, kode_pengajar, kode_mapel, tarif, status, konfirmasi)
    VALUES
    ('$tanggal', '$kode_jadwal', '$kode_pengajar', '$kode_mapel', '$tarif', '$status', '$konfirmasi')
");

echo "<script>
    alert('Absensi berhasil disimpan');
    location='../../index.php?menu=absensi';
</script>";
