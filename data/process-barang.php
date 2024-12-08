<?php

$back_button = "
<form method='POST' action='form-tambah-barang.php'>
<button type='submit'>Kembali</button>
</form>
";

if (isset($_POST['tambah'])) {
    $nama_barang = $_POST['nama-barang'];

    function tambahBarang($nama_barang)
    {

        if (empty($_POST['nama-barang'])) {
            die("Nama barang tidak boleh kosong!");
        }

        $file_path = "barang.txt";
        $file_content = file_exists($file_path) ? array_filter(array_map('trim', file($file_path))) : [];

        if (in_array($nama_barang, $file_content)) {
            $message = "Data '$nama_barang' sudah ada di dalam database!";
            return [
                "error" => "error",
                "message" => $message
            ];
        }

        $file = fopen($file_path, "a");
        fwrite($file, $nama_barang . PHP_EOL);
        fclose($file);

        $message = "Data '$nama_barang' berhasil diinput!";

        return [
            "message" => $message
        ];
    }

    $tambahBarang = tambahBarang($nama_barang);

    if (isset($tambahBarang['error'])) {
        echo $tambahBarang['message'];
    } else {
        echo $tambahBarang['message'];
    }
    echo $back_button;
}
if (isset($_POST['hapus'])) {
    $nama_barang = $_POST['nama-barang'];
    function hapusBarang($nama_barang)
    {
        $file_path = "barang.txt";

        // Periksa apakah file ada
        if (!file_exists($file_path)) {
            $back_button = "
                    <form method='POST' action='form-hapus-barang.php'>
                        <button type='submit'>Kembali</button>
                    </form>
                ";
            return "File tidak ditemukan!" . $back_button;
        }

        // Membaca isi file
        $file_content = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Cek apakah nama barang ada di dalam file
        if (!in_array($nama_barang, $file_content)) {
            $back_button = "
                    <form method='POST' action='form-hapus-barang.php'>
                        <button type='submit'>Kembali</button>
                    </form>
                ";
                return "Data '$nama_barang' tidak ditemukan di dalam database!" . $back_button;
        }

        // Hapus nama barang dari array
        $file_content = array_filter($file_content, function ($line) use ($nama_barang) {
            return trim($line) !== $nama_barang;
        });

        // Tulis ulang file tanpa nama barang yang dihapus
        file_put_contents($file_path, implode(PHP_EOL, $file_content) . PHP_EOL);

        $back_button = "
                <form method='POST' action='form-hapus-barang.php'>
                    <button type='submit'>Kembali</button>
                </form>
            ";
        return "Data '$nama_barang' berhasil dihapus!" . $back_button;
    }

    $result = hapusBarang($nama_barang);
    echo $result;
}

if (isset($_POST['cari'])) {
    $nama_barang = $_POST['nama-barang'];
    
    function cariBarang($nama_barang)
    {
        $file_path = "barang.txt";

        // Periksa apakah file ada
        if (!file_exists($file_path)) {
            $back_button = "
                    <form method='POST' action='form-cari-barang.php'>
                        <button type='submit'>Kembali</button>
                    </form>
                ";
            return "File tidak ditemukan!" . $back_button;
        }

        // Membaca isi file
        $file_content = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Cek apakah nama barang ada di dalam file
        if (in_array($nama_barang, $file_content)) {
            $back_button = "
                    <form method='POST' action='form-cari-barang.php'>
                        <button type='submit'>Kembali</button>
                    </form>
                ";
            return "Data '$nama_barang' ditemukan di dalam database!" . $back_button;
        } else {
            $back_button = "
                    <form method='POST' action='form-cari-barang.php'>
                        <button type='submit'>Kembali</button>
                    </form>
                ";
            return "Data '$nama_barang' tidak ditemukan di dalam database!" . $back_button;
        }
    }

    $result = cariBarang($nama_barang);
    echo $result;
}

if (isset($_POST['tampil'])) {

    function tampilBarang() {
        $file_path = "barang.txt";

        // Periksa apakah file ada
        if (!file_exists($file_path)) {
            $back_button = "
                <form method='POST' action='../home/homepage.php'>
                    <button type='submit'>Kembali</button>
                </form>
            ";
            return "File tidak ditemukan!" . $back_button;
        }

        // Membaca isi file
        $file_content = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (empty($file_content)) {
            $back_button = "
                <form method='POST' action='../home/homepage.php'>
                    <button type='submit'>Kembali</button>
                </form>
            ";
            return "Tidak ada data barang yang tersedia." . $back_button;
        }

        // Tampilkan semua data barang dalam tabel
        $output = "<table border='1'><tr><th>Nama Barang</th></tr>";
        foreach ($file_content as $barang) {
            $output .= "<tr><td>" . htmlspecialchars($barang) . "</td></tr>";
        }
        $output .= "</table>";

        $back_button = "
            <form method='POST' action='../home/homepage.php'>
                <button type='submit'>Kembali</button>
            </form>
        ";
        return $output . $back_button;
    }

    $result = tampilBarang();
    echo $result;
}
?>