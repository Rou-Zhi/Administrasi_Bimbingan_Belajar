<?php
$kode_pengajar = $_GET['id'];
$sql = "SELECT * FROM pengajar WHERE kode_pengajar='$kode_pengajar'";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($query);

if(!$data){
    echo "<script>alert('Data tidak ditemukan');history.back();</script>";
    exit;
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Edit Pengajar</h6>

        <form action="App/Pengajar/pengajar-update.php" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Pengajar</label>
                <input type="text" name="kode_pengajar" class="form-control"
                    value="<?= htmlspecialchars($data['kode_pengajar']); ?>" readonly
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Pengajar</label>
                <input type="text" name="nama_pengajar" class="form-control"
                    value="<?= htmlspecialchars($data['nama_pengajar']); ?>" required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">No Handphone</label>
                <input type="text" name="no_hp" class="form-control"
                    value="<?= htmlspecialchars($data['no_hp']); ?>" required
                >
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Update
                </button>
                <a href="index.php?menu=pengajar" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
