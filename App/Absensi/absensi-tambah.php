<?php
$jadwalQuery = mysqli_query($connect, "
    SELECT
        jadwal.kode_jadwal,
        jadwal.hari,
        jadwal.jam,
        pengajar.kode_pengajar,
        pengajar.nama_pengajar,
        mapel.kode_mapel,
        mapel.nama_mapel
        FROM jadwal
        JOIN pengajar ON jadwal.kode_pengajar = pengajar.kode_pengajar
        JOIN mapel ON jadwal.kode_mapel = mapel.kode_mapel
        ORDER BY FIELD(jadwal.hari,'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'), jadwal.jam
");
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Tambah Absensi Pengajar</h6>
        <form action="App/Absensi/absensi-create.php" method="post">
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jadwal</label>
                <select name="kode_jadwal" class="form-select" required>
                    <option value="">-- Pilih Jadwal --</option>
                    <?php while($j = mysqli_fetch_assoc($jadwalQuery)): ?>
                        <option value="<?= $j['kode_jadwal']; ?>">
                            <?= $j['hari']; ?> | <?= $j['jam']; ?> |
                            <?= $j['kode_pengajar']; ?> - <?= $j['nama_pengajar']; ?> - <?= $j['nama_mapel']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Status Kehadiran</label>
                <select name="status" class="form-select" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alpha">Alpha</option>
                </select>
            </div>

            <input type="hidden" name="konfirmasi" value="0">

            <button class="btn btn-primary">
                <i class="fa fa-save me-1"></i> Simpan Absensi
            </button>
        </form>
    </div>
</div>
