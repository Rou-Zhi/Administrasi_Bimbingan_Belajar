<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Tambah Pengajar</h6>
        </div>

        <form action="App/Pengajar/pengajar-create.php" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Pengajar</label>
                <input type="text" name="kode_pengajar" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Pengajar</label>
                <input type="text" name="nama_pengajar" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">No Handphone</label>
                <input type="text" name="no_hp" class="form-control" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Simpan
                </button>
                <a href="index.php?menu=pengajar" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
