<?php
include "connection.php";
$bulan_ini = date('m');
$tahun_ini = date('Y');

$sqlTotalPendapatan = "SELECT SUM(biaya) AS total 
        FROM spp 
        WHERE MONTH(tanggal) = '$bulan_ini' 
        AND YEAR(tanggal) = '$tahun_ini' 
        AND status = 1";
$totalPendapatan = mysqli_fetch_assoc(mysqli_query($connect, $sqlTotalPendapatan))['total'] ?? 0;

$sqlTotalPengeluaran = "SELECT SUM(tarif) AS total 
        FROM absensi 
        WHERE MONTH(tanggal) = '$bulan_ini' AND YEAR(tanggal) = '$tahun_ini' AND konfirmasi = 1";
$totalPengeluaran = mysqli_fetch_assoc(mysqli_query($connect, $sqlTotalPengeluaran))['total'] ?? 0;

$sqlTotalPengajar = "SELECT COUNT(*) AS total FROM pengajar";
$totalPengajar = mysqli_fetch_assoc(mysqli_query($connect, $sqlTotalPengajar))['total'] ?? 0;

$sqlTotalMurid = "SELECT COUNT(*) AS total FROM murid";
$totalMurid = mysqli_fetch_assoc(mysqli_query($connect, $sqlTotalMurid))['total'] ?? 0;

$sqlRiwayat = "SELECT 
        spp.tanggal, 
        spp.biaya, 
        spp.status, 
        murid.nama_murid AS murid
        FROM spp
        LEFT JOIN murid ON spp.kode_murid = murid.kode_murid
        ORDER BY spp.tanggal DESC
        LIMIT 5";
$resultRiwayat = mysqli_query($connect, $sqlRiwayat);
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4" style="height: 120px;">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Pendapatan Bulan ini</p>
                    <h6 class="mb-0">Rp <?= number_format($totalPendapatan,0,',','.') ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4" style="height: 120px;">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Pengeluaran Bulan ini</p>
                    <h6 class="mb-0">Rp <?= number_format($totalPengeluaran,0,',','.') ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4" style="height: 120px;">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Pengajar</p>
                    <h6 class="mb-0"><?= $totalPengajar ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4" style="height: 120px;">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Murid</p>
                    <h6 class="mb-0"><?= $totalMurid ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12" style="display: none;">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Worldwide Sales</h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="worldwide-sales"></canvas>
            </div>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Pendapatan dan Pengeluaran</h6>
                    <a href="">Tunjukkan Semua</a>
                </div>
                <canvas id="salse-revenue"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Riwayat Pendapatan</h6>
            <a href="">Tunjukkan Semua</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Tanggal</th>
                        <th scope="col">Murid</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php while($row = mysqli_fetch_assoc($resultRiwayat)): ?>
                    <tr>
                        <td><?= date('d-M-Y', strtotime($row['tanggal'])) ?></td>
                        <td><?= htmlspecialchars($row['murid']) ?></td>
                        <td>Rp <?= number_format($row['biaya'],0,',','.') ?></td>
                        <td>
                            <?php if($row['status'] == 1): ?>
                                <span class="alert alert-success py-1 px-2 rounded">Lunas</span>
                            <?php else: ?>
                                <span class="alert alert-danger py-1 px-2 rounded">Belum Bayar</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->


<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Calender</h6>
                    <a href="">Show All</a>
                </div>
                <div id="calender"></div>
            </div>
        </div>
    </div>
</div>
<!-- Widgets End -->