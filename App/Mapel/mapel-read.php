<?php
$sql = "SELECT * FROM mapel 
ORDER BY tingkat, kode_mapel, nama_mapel";
$query = mysqli_query($connect, $sql);
$no = 1;
?>

<!-- Mapel Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Data Mata Pelajaran</h6>
        </div>
        <div class="d-flex mb-4">
            <a class="btn btn-sm btn-primary" href="index.php?menu=mapel&aksi=tambah">
                <i class="fa fa-plus me-1"></i> Tambah Mata Pelajaran 
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Kode Pelajaran</th>
                        <th>Nama Pelajaran</th>
                        <th width="150">Tingkat</th>
                        <th width="150">Tarif</th>
                        <th width="140" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php if(mysqli_num_rows($query) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['kode_mapel']); ?></td>
                        <td><?= htmlspecialchars($row['nama_mapel']); ?></td>
                        <td><?= htmlspecialchars($row['tingkat']); ?></td>
                        <td>
                            <?php if(!empty($row['tarif'])): ?>
                                Rp <?= number_format((int)$row['tarif'], 0, ',', '.'); ?>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <a href="index.php?menu=mapel&aksi=edit&id=<?= $row['kode_mapel']; ?>"
                               class="btn btn-sm btn-warning">
                               <i class="fa fa-edit"></i>
                            </a>
                            <a href="App/Mapel/mapel-delete.php?id=<?= $row['kode_mapel']; ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Hapus mapel ini?')">
                               <i class="fa fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Belum ada data mata pelajaran
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Mapel End -->
