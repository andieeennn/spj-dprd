<?php
session_start();
include "../koneksi.php";

// Cek apakah ada pencarian
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];

    $data = mysqli_query($conn, "
    SELECT spj.*, users.nama
    FROM spj
    JOIN users ON spj.id_user = users.id
    WHERE users.nama LIKE '%$cari%'
    OR spj.nomor_spj LIKE '%$cari%'
    OR spj.kegiatan LIKE '%$cari%'
    ");
}else{
    $data = mysqli_query($conn, "
    SELECT spj.*, users.nama
    FROM spj
    JOIN users ON spj.id_user = users.id
    ");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data SPJ</title>
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

        <h2>Data SPJ</h2>

        <form method="GET" class="search-box">

            <input
                type="text"
                name="cari"
                placeholder="Cari Nama, Nomor SPJ, atau Kegiatan"
                value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">

            <button type="submit">Cari</button>

            <a href="data_spj.php" class="btn-refresh">Refresh</a>

        </form>

        <table>

            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No SPJ</th>
                <th>Tanggal</th>
                <th>Kegiatan</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no=1;
            while($d=mysqli_fetch_assoc($data)){
            ?>

            <tr>

                <td><?= $no++; ?></td>

                <td><?= $d['nama']; ?></td>

                <td><?= $d['nomor_spj']; ?></td>

                <td><?= $d['tanggal']; ?></td>

                <td><?= $d['kegiatan']; ?></td>

                <td>Rp <?= number_format($d['jumlah'],0,',','.'); ?></td>

                <td><?= $d['status']; ?></td>

                <td>
                    <a href="edit_spj.php?id=<?= $d['id']; ?>">Edit</a> |
                    <a href="hapus_spj.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>