<?php
$filterTanggal = $_GET['tanggal'] ?? '';
$where = $filterTanggal ? "WHERE absensi.tanggal = '$filterTanggal'" : '';

$sql = "SELECT
        absensi.id_absensi,
        absensi.tanggal,
        absensi.status,
        absensi.konfirmasi,
        absensi.tarif,

        jadwal.hari,
        jadwal.jam,

        pengajar.nama_pengajar,
        mapel.kode_mapel
        FROM absensi AS absensi
        LEFT JOIN jadwal   AS jadwal   ON absensi.kode_jadwal   = jadwal.kode_jadwal
        LEFT JOIN pengajar AS pengajar ON absensi.kode_pengajar = pengajar.kode_pengajar
        LEFT JOIN mapel    AS mapel    ON absensi.kode_mapel    = mapel.kode_mapel
        $where
        ORDER BY absensi.tanggal DESC, jadwal.jam ASC";
$query = mysqli_query($connect, $sql);
$no = 1;
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex justify-content-between mb-4">
            <h6 class="mb-0">Data Absensi Pengajar</h6>
        </div>

        <div class="d-flex mb-2">
            <a class="btn btn-sm btn-primary me-2" href="index.php?menu=absensi&aksi=tambah">
                <i class="fa fa-plus me-1"></i> Tambah Absensi
            </a>

            <form method="get" class="d-flex align-items-center">
                <input type="hidden" name="menu" value="absensi">
                <input type="hidden" name="aksi" value="read">
                <input type="date" name="tanggal" class="form-control form-control-sm me-2" style="width: 150px";
                    value="<?= $_GET['tanggal'] ?? '' ?>" required>
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fa fa-calendar me-1"></i> Tampilkan
                </button>
            </form>
        </div>

        <div class="d-flex mb-4">
            <?php if(isset($_GET['tanggal'])): ?>
                <a href="App/Absensi/absensi-konfirmasi-semua.php?tanggal=<?= $_GET['tanggal'] ?>" 
                class="btn btn-sm btn-success"
                onclick="return confirm('Konfirmasi semua absensi pada tanggal <?= $_GET['tanggal']; ?>?')">
                <i class="fa fa-check me-1"></i> Konfirmasi Semua
                </a>
            <?php endif; ?>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th width="40">No</th>
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Pengajar</th>
                        <th>Mapel</th>
                        <th>Tarif</th>
                        <th>Status</th>
                        <th>Konfirmasi</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php if(mysqli_num_rows($query) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($query)): ?>
                        <?php
                        $statusKey = strtolower($row['status']);
                        $badge = [
                            'hadir' => 'success',
                            'izin'  => 'warning',
                            'sakit' => 'info',
                            'alpha' => 'danger'
                        ];

                        $konfirmasi = $row['konfirmasi'] ?? 0;
                        ?>

                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                            <td><?= $row['hari']; ?></td>
                            <td><?= $row['jam']; ?></td>
                            <td><?= htmlspecialchars($row['nama_pengajar']); ?></td>
                            <td><?= htmlspecialchars($row['kode_mapel']); ?></td>
                            <td class="text-end">
                                Rp <?= number_format($row['tarif'], 0, ',', '.'); ?>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-<?= $badge[$statusKey]; ?>">
                                    <?= $row['status']; ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <?php if($konfirmasi == 1): ?>
                                    <span class="badge bg-success">Disetujui</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Belum</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <a href="index.php?menu=absensi&aksi=edit&id=<?= $row['id_absensi']; ?>"
                                   class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <?php if($konfirmasi != 1): ?>
                                    <a href="App/Absensi/absensi-konfirmasi.php?id=<?= $row['id_absensi']; ?>"
                                       class="btn btn-sm btn-success"
                                       onclick="return confirm('Konfirmasi absensi ini?')">
                                        <i class="fa fa-check"></i>
                                    </a>

                                    <a href="App/Absensi/absensi-delete.php?id=<?= $row['id_absensi']; ?>"
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus absensi ini?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>

                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10" class="text-center text-muted">
                            Belum ada data absensi
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
