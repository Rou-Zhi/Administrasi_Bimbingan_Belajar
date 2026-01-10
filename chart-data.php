<?php
include "connection.php";

$jumlahTahun = 5;
$tahunSekarang = date('Y');
$tahunAwal = $tahunSekarang - $jumlahTahun + 1;

$data = [
    'labels' => [],
    'pendapatan' => [],
    'pengeluaran' => []
];

for ($tahun = $tahunAwal; $tahun <= $tahunSekarang; $tahun++) {
    $data['labels'][] = $tahun;

    $totalPendapatan = mysqli_fetch_assoc(mysqli_query($connect, 
        "SELECT SUM(biaya) AS total FROM spp WHERE YEAR(tanggal) = '$tahun' AND status = 1"))['total'] ?? 0;
    $data['pendapatan'][] = (int)$totalPendapatan;

    $totalPengeluaran = mysqli_fetch_assoc(mysqli_query($connect, 
        "SELECT SUM(tarif) AS total FROM absensi WHERE YEAR(tanggal) = '$tahun' AND konfirmasi = 1"))['total'] ?? 0;
    $data['pengeluaran'][] = (int)$totalPengeluaran;
}

header('Content-Type: application/json');
echo json_encode($data);
?>