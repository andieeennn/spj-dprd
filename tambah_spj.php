<?php
session_start();
include "../koneksi.php";

// Ambil semua user
$user = mysqli_query($conn, "SELECT * FROM users WHERE role='user'");

// Simpan data
if(isset($_POST['simpan'])){

    $id_user = $_POST['id_user'];
    $nomor = $_POST['nomor'];
    $tanggal = $_POST['tanggal'];
    $kegiatan = $_POST['kegiatan'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];

    mysqli_query($conn,"INSERT INTO spj(id_user, nomor_spj, tanggal, kegiatan, jumlah, keterangan, status)
    VALUES('$id_user','$nomor','$tanggal','$kegiatan','$jumlah','$keterangan','Menunggu')");

    echo "<script>
    alert('Data berhasil disimpan');
    window.location='data_spj.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah SPJ</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="header">
    <h1>Sistem Informasi SPJ DPRD</h1>
    <p>Selamat Datang, <b><?= $_SESSION['nama']; ?></b></p>
</div>

<div class="menu">
    <a href="dashboard.php">Dashboard</a>
    <a href="tambah_spj.php">Tambah SPJ</a>
    <a href="data_spj.php">Data SPJ</a>
    <a href="data_user.php">Data User</a>
    <a href="../logout.php">Logout</a>
</div>

<div class="container">

<div class="card">

<h2>Tambah SPJ</h2>

<form method="POST">

<label>Nama User</label>

<select name="id_user" required>

<option value="">-- Pilih User --</option>

<?php while($u=mysqli_fetch_assoc($user)){ ?>

<option value="<?= $u['id']; ?>">
<?= $u['nama']; ?>
</option>

<?php } ?>

</select>

<label>Nomor SPJ</label>
<input type="text" name="nomor" required>

<label>Tanggal</label>
<input type="date" name="tanggal" required>

<label>Kegiatan</label>
<input type="text" name="kegiatan" required>

<label>Jumlah</label>
<input type="number" name="jumlah" required>

<label>Keterangan</label>
<textarea name="keterangan" rows="5"></textarea>

<div class="button-group">
    <button type="submit" name="simpan">💾 Simpan</button>

    <a href="dashboard.php" class="btn-kembali">
        ← Kembali
    </a>
</div>

</form>

</div>

</div>

</body>
</html>