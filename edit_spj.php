<?php
session_start();
include "../koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM spj WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nomor = $_POST['nomor'];
    $tanggal = $_POST['tanggal'];
    $kegiatan = $_POST['kegiatan'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE spj SET
        nomor_spj='$nomor',
        tanggal='$tanggal',
        kegiatan='$kegiatan',
        jumlah='$jumlah',
        keterangan='$keterangan',
        status='$status'
        WHERE id='$id'
    ");

    echo "<script>
        alert('Data berhasil diubah');
        window.location='data_spj.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit SPJ</title>
   <link rel="stylesheet" href="../style.css">
</head>
<body>

<h1>Sistem Informasi SPJ DPRD</h1>

<p>Selamat Datang, <b><?= $_SESSION['nama']; ?></b></p>

<hr>

<a href="dashboard.php">Dashboard</a> |
<a href="tambah_spj.php">Tambah SPJ</a> |
<a href="data_spj.php">Data SPJ</a> |
<a href="data_user.php">Data User</a> |
<a href="../logout.php">Logout</a>

<hr>

<h2>Edit SPJ</h2>

<form method="POST">

<label>Nomor SPJ</label><br>
<input type="text" name="nomor" value="<?= $d['nomor_spj']; ?>" required>

<br><br>

<label>Tanggal</label><br>
<input type="date" name="tanggal" value="<?= $d['tanggal']; ?>" required>

<br><br>

<label>Kegiatan</label><br>
<input type="text" name="kegiatan" value="<?= $d['kegiatan']; ?>" required>

<br><br>

<label>Jumlah</label><br>
<input type="number" name="jumlah" value="<?= $d['jumlah']; ?>" required>

<br><br>

<label>Keterangan</label><br>
<textarea name="keterangan" rows="4" cols="40"><?= $d['keterangan']; ?></textarea>

<br><br>

<label>Status</label><br>
<select name="status">
    <option value="Menunggu" <?= ($d['status']=="Menunggu") ? "selected" : ""; ?>>Menunggu</option>
    <option value="Disetujui" <?= ($d['status']=="Disetujui") ? "selected" : ""; ?>>Disetujui</option>
    <option value="Ditolak" <?= ($d['status']=="Ditolak") ? "selected" : ""; ?>>Ditolak</option>
</select>

<br><br>

<button type="submit" name="update">Update</button>
<a href="data_spj.php">
    <button type="button">Kembali</button>
</a>

</form>

</body>
</html>