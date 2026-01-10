<?php
$dari   = $_GET['dari'] ?? '';
$sampai = $_GET['sampai'] ?? '';
$where = '';

if ($dari && $sampai) {
    $where = "WHERE spp.tanggal BETWEEN '$dari' AND '$sampai'";
}

$sql = "SELECT
        spp.id_spp,
        spp.tanggal,
        spp.tingkat,
        spp.biaya,
        spp.status,

        murid.kode_murid,
        murid.nama_murid
        FROM spp
        LEFT JOIN murid ON spp.kode_murid = murid.kode_murid
        $where
        ORDER BY spp.tanggal DESC";
$query = mysqli_query($connect, $sql);
$no = 1;
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Data SPP</h6>
        </div>
        <div class="d-flex mb-4">
            <a class="btn btn-sm btn-primary me-2" href="index.php?menu=spp&aksi=tambah">
                <i class="fa fa-plus me-1"></i> Tambah SPP
            </a>

            <form method="get" class="d-flex align-items-center" >
                <input type="hidden" name="menu" value="spp">
                <input type="hidden" name="aksi" value="read">
                <span class="me-2">Dari</span>
                <input type="date" name="dari" class="form-control form-control-sm me-2" style="width: 150px">
                <span class="me-2">Sampai</span>
                <input type="date" name="sampai" class="form-control form-control-sm me-2" style="width: 150px">
                <button type="submit" class="btn btn-sm btn-primary" >
                    <i class="fa fa-calendar me-1"></i> Tampilkan
                </button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th width="40">No</th>
                        <th>Tanggal</th>
                        <th>Nama Murid</th>
                        <th>Tingkat</th>
                        <th>Biaya</th>
                        <th>Status</th>
                        <th width="130">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php if(mysqli_num_rows($query) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                            <td><?= htmlspecialchars($row['nama_murid']); ?></td>
                            <td><?= htmlspecialchars($row['tingkat']); ?></td>
                            <td class="text-end">
                                Rp <?= number_format($row['biaya'], 0, ',', '.'); ?>
                            </td>
                            <td class="text-center">
                                <?= $row['status'] == 1
                                    ? '<span class="badge bg-success">Lunas</span>'
                                    : '<span class="badge bg-warning text-dark">Belum</span>' ?>
                            </td>
                            <td class="text-center">
                                <a href="index.php?menu=spp&aksi=edit&id=<?= $row['id_spp']; ?>"
                                   class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="App/SPP/spp-delete.php?id=<?= $row['id_spp']; ?>"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Hapus data SPP ini?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Belum ada data SPP
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
