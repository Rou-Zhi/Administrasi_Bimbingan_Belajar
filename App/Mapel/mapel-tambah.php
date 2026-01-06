<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Tambah Mata Pelajaran</h6>
        </div>

        <form action="App/Mapel/mapel-create.php" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Mata Pelajaran</label>
                <input type="text" name="kode_mapel" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Mata Pelajaran</label>
                <input type="text" name="nama_mapel" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <select name="tingkat" class="form-select" required>
                    <option value="">-- Pilih Tingkat --</option>
                    <option value="TK">TK</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="Umum">Umum</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tarif per Sesi</label>
                <input type="number" name="tarif" class="form-control" placeholder="contoh: 30000">
                <small class="text-muted">Ketik 0 jika belum ditentukan</small>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Simpan
                </button>
                <a href="index.php?menu=mapel" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
