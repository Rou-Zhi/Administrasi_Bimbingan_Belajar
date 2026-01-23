<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Tambah Admin</h6>
        </div>

        <form action="App/Admin/admin-create.php" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Admin</label>
                <input type="text" name="kode_admin" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Admin</label>
                <input type="text" name="nama_admin" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Simpan
                </button>
                <a href="index.php?menu=admin" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
