<?php
$sql = "SELECT * FROM admin 
ORDER BY kode_admin";
$query = mysqli_query($connect, $sql);
$no = 1;
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Data Admin</h6>
        </div>
        <div class="d-flex mb-4">
            <a class="btn btn-sm btn-primary" href="index.php?menu=admin&aksi=tambah">
                <i class="fa fa-plus me-1"></i> Tambah Admin 
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Kode Admin</th>
                        <th>Nama Admin</th>
                        <th>Email</th>
                        <th width="140" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php if(mysqli_num_rows($query) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['kode_admin']); ?></td>
                        <td><?= htmlspecialchars($row['nama_admin']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td class="text-center">
                            <a href="index.php?menu=admin&aksi=edit&id=<?= $row['kode_admin']; ?>"
                               class="btn btn-sm btn-warning">
                               <i class="fa fa-edit"></i>
                            </a>
                            <a href="App/Admin/admin-delete.php?id=<?= $row['kode_admin']; ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Hapus Admin ini?')">
                               <i class="fa fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Belum ada data admin
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
