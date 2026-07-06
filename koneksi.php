<?php

$conn = mysqli_connect("localhost", "root", "", "spj_dprd");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>