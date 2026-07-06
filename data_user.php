<?php
session_start();
include "../koneksi.php";

$data = mysqli_query($conn,"SELECT * FROM users WHERE role='user'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
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

        <h2>Data User</h2>

        <table>

            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
            </tr>

            <?php
            $no = 1;
            while($d = mysqli_fetch_assoc($data)){
            ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['nama']; ?></td>
                <td><?= $d['username']; ?></td>
            </tr>

            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>