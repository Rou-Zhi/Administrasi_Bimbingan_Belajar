<?php
$sql = "SELECT * FROM pengajar 
ORDER BY kode_pengajar";
$query = mysqli_query($connect, $sql);
$no = 1;
?>

<!-- Pengajar Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Data Pengajar</h6>
        </div>
        <div class="d-flex mb-4">
            <a class="btn btn-sm btn-primary" href="index.php?menu=pengajar&aksi=tambah">
                <i class="fa fa-plus me-1"></i> Tambah Pengajar 
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th width="150">Kode Pengajar</th>
                        <th width="300">Nama Pengajar</th>
                        <th>No Handphone</th>
                        <th width="140" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php if(mysqli_num_rows($query) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['kode_pengajar']); ?></td>
                        <td><?= htmlspecialchars($row['nama_pengajar']); ?></td>
                        <td><?= htmlspecialchars($row['no_hp']); ?></td>
                        <td class="text-center">
                            <a href="index.php?menu=pengajar&aksi=edit&id=<?= $row['kode_pengajar']; ?>"
                               class="btn btn-sm btn-warning">
                               <i class="fa fa-edit"></i>
                            </a>
                            <a href="App/Pengajar/pengajar-delete.php?id=<?= $row['kode_pengajar']; ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Hapus pengajar ini?')">
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
<!-- Pengajar End -->
