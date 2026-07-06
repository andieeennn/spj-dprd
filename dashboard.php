<?php
session_start();
include "../koneksi.php";

$id_user = $_SESSION['id'];

$data = mysqli_query($conn, "SELECT * FROM spj WHERE id_user='$id_user'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="header">
    <h1>Dashboard User</h1>
    <p>Selamat Datang, <b><?= $_SESSION['nama']; ?></b></p>
</div>

<div class="menu">
    <a href="dashboard.php">SPJ Saya</a>
    <a href="../logout.php">Logout</a>
</div>

<div class="container">

    <div class="card">

        <h2>Data SPJ Saya</h2>

        <table>

            <tr>
                <th>No</th>
                <th>No SPJ</th>
                <th>Tanggal</th>
                <th>Kegiatan</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>

            <?php
            $no = 1;
            while($d = mysqli_fetch_assoc($data)){
            ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['nomor_spj']; ?></td>
                <td><?= $d['tanggal']; ?></td>
                <td><?= $d['kegiatan']; ?></td>
                <td>Rp <?= number_format($d['jumlah'],0,',','.'); ?></td>
                <td><?= $d['status']; ?></td>
            </tr>

            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>