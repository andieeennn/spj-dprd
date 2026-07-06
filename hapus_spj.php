<?php
include "../koneksi.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM spj WHERE id='$id'");

header("Location: data_spj.php");
exit;
?>