<?php
$sql = "SELECT jadwal.*, 
        mapel.nama_mapel, mapel.tingkat, 
        pengajar.nama_pengajar
        FROM jadwal
        LEFT JOIN mapel ON jadwal.kode_mapel = mapel.kode_mapel
        LEFT JOIN pengajar ON jadwal.kode_pengajar = pengajar.kode_pengajar
        ORDER BY FIELD(jadwal.hari,'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'), jadwal.jam";
$query = mysqli_query($connect, $sql);
$no = 1;
?>

<!-- Jadwal Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Data Jadwal Pelajaran</h6>
        </div>
        <div class="d-flex mb-4">
            <a class="btn btn-sm btn-primary" href="index.php?menu=jadwal&aksi=tambah">
                <i class="fa fa-plus me-1"></i> Tambah Jadwal 
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Kode Jadwal</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Pengajar</th>
                        <th>Pelajaran</th>
                        <th>Tempat</th>
                        <th>Tingkat</th>
                        <th width="140" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php if(mysqli_num_rows($query) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['kode_jadwal']); ?></td>
                        <td><?= htmlspecialchars($row['hari']); ?></td>
                        <td><?= htmlspecialchars($row['jam']); ?></td>
                        <td><?= htmlspecialchars($row['nama_pengajar']); ?></td>
                        <td><?= htmlspecialchars($row['kode_mapel']); ?></td>
                        <td><?= htmlspecialchars($row['tempat']); ?></td>
                        <td><?= htmlspecialchars($row['tingkat']); ?></td>
                        <td class="text-center">
                            <a href="index.php?menu=jadwal&aksi=edit&id=<?= $row['kode_jadwal']; ?>" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="App/Jadwal/jadwal-delete.php?id=<?= $row['kode_jadwal']; ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Hapus jadwal ini?')">
                            <i class="fa fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center text-muted">
                            Belum ada data jadwal mata pelajaran
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Jadwal End -->
