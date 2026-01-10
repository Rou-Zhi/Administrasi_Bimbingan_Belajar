<?php
$dari   = $_GET['dari'] ?? '';
$sampai = $_GET['sampai'] ?? '';

$whereAbsensi = "WHERE 1=1";
$whereSPP     = "WHERE 1=1";

if ($dari && $sampai) {
    $whereAbsensi .= " AND absensi.tanggal BETWEEN '$dari' AND '$sampai'";
    $whereSPP     .= " AND spp.tanggal BETWEEN '$dari' AND '$sampai'";
}

$sqlPengeluaran = "SELECT
        absensi.tanggal,
        pengajar.nama_pengajar,
        absensi.tarif
        FROM absensi
        LEFT JOIN pengajar ON absensi.kode_pengajar = pengajar.kode_pengajar
        $whereAbsensi
        AND absensi.konfirmasi = 1
        ORDER BY absensi.tanggal ASC";
$qPengeluaran = mysqli_query($connect, $sqlPengeluaran);
$sqlTotalPengeluaran = "SELECT SUM(tarif) AS total FROM absensi
$whereAbsensi AND konfirmasi = 1";
$totalPengeluaran = mysqli_fetch_assoc(mysqli_query($connect, $sqlTotalPengeluaran))['total'] ?? 0;

$sqlPendapatan = "SELECT
        spp.tanggal,
        murid.nama_murid,
        spp.biaya
        FROM spp
        LEFT JOIN murid ON spp.kode_murid = murid.kode_murid
        $whereSPP
        AND spp.status = 1
        ORDER BY spp.tanggal ASC";
$qPendapatan = mysqli_query($connect, $sqlPendapatan);
$sqlTotalPendapatan = "SELECT SUM(biaya) AS total FROM spp
$whereSPP AND status = 1";
$totalPendapatan = mysqli_fetch_assoc(mysqli_query($connect, $sqlTotalPendapatan))['total'] ?? 0;

$saldo = $totalPendapatan - $totalPengeluaran;
?>

<div class="container-fluid pt-4 px-4">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="alert alert-success">
                <strong>Pendapatan</strong><br>
                Rp <?= number_format($totalPendapatan,0,',','.') ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="alert alert-danger">
                <strong>Pengeluaran</strong><br>
                Rp <?= number_format($totalPengeluaran,0,',','.') ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="alert alert-primary">
                <strong>Saldo</strong><br>
                Rp <?= number_format($saldo,0,',','.') ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex justify-content-between mb-4">
            <h6 class="mb-0">Laporan Pengeluaran dan Pendapatan</h6>
        </div>
    
        <form method="get" action="index.php" class="d-flex align-items-center mb-3">
            <input type="hidden" name="menu" value="laporan">
            <input type="hidden" name="aksi" value="read">
            <span class="me-2">Dari</span>
            <input type="date" name="dari"
                class="form-control form-control-sm me-2"
                value="<?= $dari ?>" style="width:150px">

            <span class="me-2">Sampai</span>
            <input type="date" name="sampai"
                class="form-control form-control-sm me-2"
                value="<?= $sampai ?>" style="width:150px">

            <button class="btn btn-sm btn-primary">
                <i class="fa fa-calendar me-1"></i> Tampilkan
            </button>
        </form>

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light text-center">
                <tr>
                    <th width="50">No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Pendapatan</th>
                    <th>Pengeluaran</th>
                </tr>
            </thead>

            <tbody>
                <tr class="table-success fw-bold text-center">
                    <td colspan="5">Pendapatan</td>
                </tr>

                <?php $no=1; while($s = mysqli_fetch_assoc($qPendapatan)): ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= date('d-m-Y', strtotime($s['tanggal'])) ?></td>
                    <td><?= htmlspecialchars($s['nama_murid']) ?></td>
                    <td class="text-end">Rp <?= number_format($s['biaya'],0,',','.') ?></td>
                    <td class="text-center">-</td>
                </tr>
                <?php endwhile; ?>
                
                <tr class="fw-bold table-success">
                    <td colspan="3" class="text-center">Total Pendapatan</td>
                    <td class="text-end">Rp <?= number_format($totalPendapatan,0,',','.') ?></td>
                    <td class="text-center"></td>
                </tr>
                
                <tr><td colspan="5"></td></tr>

                <tr class="table-danger fw-bold text-center">
                    <td colspan="5">Pengeluaran</td>
                </tr>

                <?php $no=1; while($p = mysqli_fetch_assoc($qPengeluaran)): ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= date('d-m-Y', strtotime($p['tanggal'])) ?></td>
                    <td><?= htmlspecialchars($p['nama_pengajar']) ?></td>
                    <td class="text-center">-</td>
                    <td class="text-end">Rp <?= number_format($p['tarif'],0,',','.') ?></td>
                </tr>
                <?php endwhile; ?>
                
                <tr class="fw-bold table-danger">
                    <td colspan="3" class="text-center">Total Pengeluaran</td>
                    <td class="text-center"></td>
                    <td class="text-end">Rp <?= number_format($totalPengeluaran,0,',','.') ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>