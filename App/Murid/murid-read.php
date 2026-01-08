<?php
$sql = "SELECT * FROM murid 
ORDER BY kode_murid";
$query = mysqli_query($connect, $sql);
$no = 1;
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Data Murid</h6>
        </div>
        <div class="d-flex mb-4">
            <a class="btn btn-sm btn-primary" href="index.php?menu=murid&aksi=tambah">
                <i class="fa fa-plus me-1"></i> Tambah Murid 
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Kode Murid</th>
                        <th>Nama Murid</th>
                        <th>No Handphone</th>
                        <th>Tanggal Masuk</th>
                        <th>Asal Sekolah</th>
                        <th width="140" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php if(mysqli_num_rows($query) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['kode_murid']); ?></td>
                        <td><?= htmlspecialchars($row['nama_murid']); ?></td>
                        <td><?= htmlspecialchars($row['no_hp']); ?></td>
                        <td><?= htmlspecialchars($row['tanggal_masuk']); ?></td>
                        <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                        <td class="text-center">
                            <a href="index.php?menu=murid&aksi=edit&id=<?= $row['kode_murid']; ?>"
                               class="btn btn-sm btn-warning">
                               <i class="fa fa-edit"></i>
                            </a>
                            <a href="App/Murid/murid-delete.php?id=<?= $row['kode_murid']; ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Hapus Murid ini?')">
                               <i class="fa fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Belum ada data mata pelajaran
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
