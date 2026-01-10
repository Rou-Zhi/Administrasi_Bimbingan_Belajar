<?php
$id = $_GET['id'] ?? '';
$sql = "SELECT 
            spp.*,
            murid.nama_murid
            FROM spp
            LEFT JOIN murid ON spp.kode_murid = murid.kode_murid
            WHERE spp.id_spp = '$id'";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Data SPP tidak ditemukan');history.back();</script>";
    exit;
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Edit Data SPP</h6>
        <form method="post" action="App/SPP/spp-update.php">
            <input type="hidden" name="id_spp" value="<?= $data['id_spp']; ?>">
            <div class="mb-3">
                <label class="form-label">Murid</label>
                <input type="text" class="form-control"
                       value="<?= htmlspecialchars($data['kode_murid'].' - '.$data['nama_murid']); ?>"
                       readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Pembayaran</label>
                <input type="date" name="tanggal"
                       class="form-control"
                       value="<?= $data['tanggal']; ?>"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <select name="tingkat" class="form-select" required>
                    <?php
                    $tingkatList = ['TK','SD','SMP','SMA','Umum','Private'];
                    foreach ($tingkatList as $t) {
                        $selected = ($data['tingkat'] == $t) ? 'selected' : '';
                        echo "<option value='$t' $selected>$t</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Biaya SPP</label>
                <input type="number" name="biaya"
                       class="form-control"
                       value="<?= $data['biaya']; ?>"
                       required>
            </div>

            <div class="mb-4">
                <label class="form-label">Status Pembayaran</label>
                <select name="status" class="form-select" required>
                    <option value="0" <?= $data['status']==0?'selected':''; ?>>Belum</option>
                    <option value="1" <?= $data['status']==1?'selected':''; ?>>Lunas</option>
                </select>
            </div>

            <div class="text-end">
                <a href="index.php?menu=spp&aksi=read" class="btn btn-secondary btn-sm">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary btn-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
