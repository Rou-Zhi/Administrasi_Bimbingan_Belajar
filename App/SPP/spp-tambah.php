<?php
$murid = mysqli_query($connect, 
    "SELECT kode_murid, nama_murid FROM murid ORDER BY nama_murid");
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Tambah SPP</h6>
        <form method="post" action="App/SPP/spp-create.php">
            <div class="mb-3">
                <label class="form-label">Tanggal Pembayaran</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Murid</label>
                <select name="kode_murid" class="form-select" required>
                    <option value="">-- Pilih Murid --</option>
                    <?php while($m = mysqli_fetch_assoc($murid)): ?>
                        <option value="<?= $m['kode_murid']; ?>">
                            <?= htmlspecialchars($m['kode_murid'].' - '.$m['nama_murid']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
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
                    <option value="Private">Private</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Biaya</label>
                <input type="number" name="biaya" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="0">Belum Lunas</option>
                    <option value="1">Lunas</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan SPP
            </button>
        </form>
    </div>
</div>