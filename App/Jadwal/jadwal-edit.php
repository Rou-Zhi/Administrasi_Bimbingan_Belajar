<?php
$kode_jadwal = $_GET['id'];

$sql = "SELECT jadwal.*, 
        mapel.nama_mapel, mapel.tingkat, 
        pengajar.nama_pengajar
        FROM jadwal
        LEFT JOIN mapel ON jadwal.kode_mapel = mapel.kode_mapel
        LEFT JOIN pengajar ON jadwal.kode_pengajar = pengajar.kode_pengajar
WHERE kode_jadwal='$kode_jadwal'";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($query);

if(!$data){
    echo "<script>alert('Data tidak ditemukan');history.back();</script>";
    exit;
}

$mapelQuery = mysqli_query($connect, "SELECT kode_mapel, nama_mapel FROM mapel ORDER BY nama_mapel");
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Edit Jadwal Pelajaran</h6>
        <form action="App/Jadwal/jadwal-update.php" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Jadwal</label>
                <input type="text" name="kode_jadwal" class="form-control" 
                       value="<?= htmlspecialchars($data['kode_jadwal']); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Hari</label>
                <select name="hari" class="form-select" required>
                    <?php
                    $hariList = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
                    foreach($hariList as $h){
                        $selected = ($data['hari'] == $h) ? "selected" : "";
                        echo "<option value='$h' $selected>$h</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Jam</label>
                <input type="time" name="jam" class="form-control" 
                       value="<?= htmlspecialchars($data['jam']); ?>" required>
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
                        <option value="<?= $p['kode_pengajar']; ?>"
                            <?= ($data['kode_pengajar'] == $p['kode_pengajar']) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($p['kode_pengajar'] . ' - ' . $p['nama_pengajar']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Mata Pelajaran</label>
                <select name="kode_mapel" class="form-select" required>
                    <?php while($m = mysqli_fetch_assoc($mapelQuery)): ?>
                        <option value="<?= $m['kode_mapel']; ?>" 
                            <?= ($data['kode_mapel'] == $m['kode_mapel']) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($m['kode_mapel'] . ' - ' . $m['nama_mapel']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tempat / Ruangan</label>
                <input type="text" name="tempat" class="form-control" 
                       value="<?= htmlspecialchars($data['tempat']); ?>">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Update
                </button>
                <a href="index.php?menu=jadwal" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
