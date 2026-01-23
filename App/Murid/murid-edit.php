<?php
$kode_murid = $_GET['id'];
$sql = "SELECT * FROM murid WHERE kode_murid='$kode_murid'";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($query);

if(!$data){
    echo "<script>alert('Data tidak ditemukan');history.back();</script>";
    exit;
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Edit Murid</h6>

        <form action="App/Murid/murid-update.php" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Murid</label>
                <input type="text" name="kode_murid" class="form-control"
                    value="<?= htmlspecialchars($data['kode_murid']); ?>" readonly
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Murid</label>
                <input type="text" name="nama_murid" class="form-control"
                    value="<?= htmlspecialchars($data['nama_murid']); ?>" required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">No Handphone</label>
                <input type="text" name="no_hp" class="form-control"
                    value="<?= htmlspecialchars($data['no_hp']); ?>" required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control"
                    value="<?= htmlspecialchars($data['tanggal_masuk']); ?>" required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" class="form-control"
                    value="<?= htmlspecialchars($data['asal_sekolah']); ?>" required
                >
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Update
                </button>
                <a href="index.php?menu=murid" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
