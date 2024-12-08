<?php
// login-process.php
$username = $_POST['username'];
$password = $_POST['password'];

function login($username, $password) {
    $users_available = fopen("pengguna/pengguna.txt", "r");

    while (($user_line = fgets($users_available)) !== false) {
        list($user, $pass) = explode(';', trim($user_line));

        if ($username === $user && $password === $pass) {
            fclose($users_available);
            return true;
        }
    }

    fclose($users_available);
    return false;
}

if (login($username, $password)) {
  // echo "<script>alert('Login Berhasil!'); window.location.href='../index.html';</script>";
  // sleep(5);
  $file = fopen("../data/barang.txt", "w");
  header("Location: ../home/homepage.php"); // Redirect ke dashboard jika login berhasil
  exit;

} else {
  echo "<script>alert('Login Gagal! Periksa kembali username dan password.'); window.location.href='../index.html';</script>";
}
