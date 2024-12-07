<?php
$username = $_POST['username'];
$password = $_POST['password'];

function login($username, $password) {
  $users_available = fopen("pengguna/pengguna.txt", "r");
  while (($user_line = fgets($users_available)) !== false) {
    list($user, $pass) = explode(';', trim($user_line));

    if ($username === $user && $password === $pass) {
      fclose($users_available);
      return '<p>Login Berhasil!<meta http-equiv = "refresh" content = "1; url = http://127.0.0.1/home/homepage.html" /></p>';
    } else {
      fclose($users_available);
      return "Login Gagal!";
    }
  }

}

$login = login($username, $password);
echo $login;
?>
