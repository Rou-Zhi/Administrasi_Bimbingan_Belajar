<?php
$kode_admin = $_GET['id'];
$sql = "SELECT * FROM admin WHERE kode_admin='$kode_admin'";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($query);

if(!$data){
    echo "<script>alert('Data tidak ditemukan');history.back();</script>";
    exit;
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Edit Admin</h6>

        <form action="App/Admin/admin-update.php" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Admin</label>
                <input type="text" name="kode_admin" class="form-control"
                    value="<?= htmlspecialchars($data['kode_admin']); ?>" readonly
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Admin</label>
                <input type="text" name="nama_admin" class="form-control"
                    value="<?= htmlspecialchars($data['nama_admin']); ?>" required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control"
                    value="<?= htmlspecialchars($data['email']); ?>" required
                >
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Update
                </button>
                <a href="index.php?menu=admin" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
