<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($query) > 0){

        $data = mysqli_fetch_assoc($query);

        $_SESSION['id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role'] = $data['role'];

        if($data['role'] == "admin"){
            header("Location: admin/dashboard.php");
        }else{
            header("Location: user/dashboard.php");
        }

    }else{
        echo "<script>alert('Username atau Password salah!');</script>";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login SPJ DPRD</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<h2>LOGIN SPJ DPRD</h2>

<form method="POST">

    <label>Username</label>
    <input type="text" name="username" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit" name="login">Login</button>

</form>

</body>
</html>