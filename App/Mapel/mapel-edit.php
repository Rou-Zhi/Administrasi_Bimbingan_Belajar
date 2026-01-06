<?php
$kode_mapel = $_GET['id'];
$sql = "SELECT * FROM mapel WHERE kode_mapel='$kode_mapel'";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($query);

if(!$data){
    echo "<script>alert('Data tidak ditemukan');history.back();</script>";
    exit;
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Edit Mata Pelajaran</h6>

        <form action="App/Mapel/mapel-update.php" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Mata Pelajaran</label>
                <input type="text" name="kode_mapel" class="form-control"
                    value="<?= htmlspecialchars($data['kode_mapel']); ?>" readonly
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Mata Pelajaran</label>
                <input type="text" name="nama_mapel" class="form-control"
                    value="<?= htmlspecialchars($data['nama_mapel']); ?>" required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <select name="tingkat" class="form-select" required>
                    <?php
                    $list = ['TK','SD','SMP','SMA','Umum'];
                    foreach($list as $t){
                        $selected = ($data['tingkat'] == $t) ? "selected" : "";
                        echo "<option value='$t' $selected>$t</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tarif per Jam</label>
                <input type="number" name="tarif" class="form-control"
                       value="<?= $data['tarif']; ?>">
                <small class="text-muted">Kosongkan jika belum ditentukan</small>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Update
                </button>
                <a href="index.php?menu=mapel" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
