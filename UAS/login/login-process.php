<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    function login($username, $password) {
        
        $users_available = fopen("pengguna/pengguna.txt", "r")
        foreach ($users_available as $user) {
            list($user, $pass) = explode(';', $user);
            if ($username = $user && $password == $pass){
                $berhasil = "Login Berhasil!";
                return $berhasil;
            } else {
                $gagal = "Login Gagal!"
                return $gagal;
            }
        }
    }  
    
?>