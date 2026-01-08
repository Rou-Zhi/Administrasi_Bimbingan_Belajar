<?php
$id = $_GET['id'];
$q = mysqli_query($connect, "SELECT * FROM absensi WHERE id_absensi = '$id'");
$data = mysqli_fetch_assoc($q);

if(!$data){
    echo "<script>alert('Data tidak ditemukan');history.back();</script>";
    exit;
}

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
    JOIN mapel    ON jadwal.kode_mapel = mapel.kode_mapel
    ORDER BY FIELD(jadwal.hari,'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'), jadwal.jam
");
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Edit Absensi Pengajar</h6>

        <form action="App/Absensi/absensi-update.php" method="post">
            <input type="hidden" name="id_absensi" value="<?= $data['id_absensi']; ?>">

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jadwal</label>
                <select name="kode_jadwal" class="form-select" required>
                    <?php while($j = mysqli_fetch_assoc($jadwalQuery)): ?>
                        <option value="<?= $j['kode_jadwal']; ?>" <?= $j['kode_jadwal'] === $data['kode_jadwal'] ? 'selected' : ''; ?>>
                            <?= $j['hari']; ?> | <?= $j['jam']; ?> | 
                            <?= $j['kode_pengajar']; ?> - <?= $j['nama_pengajar']; ?> - <?= $j['nama_mapel']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Status Kehadiran</label>
                <select name="status" class="form-select" required>
                    <option value="Hadir" <?= $data['status'] === 'hadir' ? 'selected' : ''; ?>>Hadir</option>
                    <option value="Izin"  <?= $data['status'] === 'izin'  ? 'selected' : ''; ?>>Izin</option>
                    <option value="Sakit" <?= $data['status'] === 'sakit' ? 'selected' : ''; ?>>Sakit</option>
                    <option value="Alpha" <?= $data['status'] === 'alpha' ? 'selected' : ''; ?>>Alpha</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Konfirmasi</label>
                <select name="konfirmasi" class="form-select">
                    <option value="Belum" <?= $data['konfirmasi'] === 0 ? 'selected' : ''; ?>>Belum</option>
                    <option value="Disetujui" <?= $data['konfirmasi'] === 1 ? 'selected' : ''; ?>>Disetujui</option>
                </select>
            </div>

            <button class="btn btn-primary">
                <i class="fa fa-save me-1"></i> Update Absensi
            </button>
        </form>
    </div>
</div>
