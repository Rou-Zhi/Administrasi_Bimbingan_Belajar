<?php
$mapelQuery = mysqli_query($connect, "SELECT kode_mapel, nama_mapel FROM mapel ORDER BY nama_mapel");
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Tambah Jadwal Pelajaran</h6>

        <form action="App/Jadwal/jadwal-create.php" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Jadwal</label>
                <input type="text" name="kode_jadwal" class="form-control" required placeholder="Misal: J1-1">
            </div>

            <div class="mb-3">
                <label class="form-label">Hari</label>
                <select name="hari" class="form-select" required>
                    <option value="">-- Pilih Hari --</option>
                    <?php
                    $hariList = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
                    foreach($hariList as $h) {
                        echo "<option value='$h'>$h</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Jam</label>
                <input type="time" name="jam" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Pengajar</label>
                <select name="kode_pengajar" class="form-select" required>
                    <option value="">-- Pilih Pengajar --</option>
                    <?php
                    $pengajarQuery = mysqli_query(
                        $connect,
                        "SELECT kode_pengajar, nama_pengajar FROM pengajar ORDER BY nama_pengajar"
                    );
                    while($p = mysqli_fetch_assoc($pengajarQuery)):
                    ?>
                        <option value="<?= $p['kode_pengajar']; ?>">
                            <?= htmlspecialchars($p['kode_pengajar'] . ' - ' . $p['nama_pengajar']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Mata Pelajaran</label>
                <select name="kode_mapel" class="form-select" required>
                    <option value="">-- Pilih Mata Pelajaran --</option>
                    <?php while($m = mysqli_fetch_assoc($mapelQuery)): ?>
                        <option value="<?= $m['kode_mapel']; ?>">
                            <?= htmlspecialchars($m['kode_mapel'] . ' - ' . $m['nama_mapel']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tempat</label>
                <input type="text" name="tempat" class="form-control" placeholder="Misal: R101">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Simpan
                </button>
                <a href="index.php?menu=jadwal" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
