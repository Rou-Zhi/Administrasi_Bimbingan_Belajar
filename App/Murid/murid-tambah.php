<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Tambah Murid</h6>
        </div>

        <form action="App/Murid/murid-create.php" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Murid</label>
                <input type="text" name="kode_murid" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Murid</label>
                <input type="text" name="nama_murid" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">No Handphone</label>
                <input type="text" name="no_hp" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" class="form-control" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Simpan
                </button>
                <a href="index.php?menu=murid" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
