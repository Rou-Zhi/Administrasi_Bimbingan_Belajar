<?php
include '../../connection.php';

if(isset($_GET['tanggal'])){
    $tanggal = $_GET['tanggal'];
    
    $sql = "UPDATE absensi SET konfirmasi = 1 WHERE tanggal = '$tanggal' AND konfirmasi = 0";
    if(mysqli_query($connect, $sql)){
        echo "<script>
                alert('Semua absensi pada tanggal $tanggal berhasil dikonfirmasi');
                window.location='../../index.php?menu=absensi&aksi=read&tanggal=$tanggal';
              </script>";
    } else {
        echo "<script>
                alert('Gagal konfirmasi absensi');
                window.location='../../index.php?menu=absensi&aksi=read';
              </script>";
    }
} else {
    echo "<script>
            alert('Tanggal belum dipilih');
            window.location='../../index.php?menu=absensi&aksi=read';
          </script>";
}
