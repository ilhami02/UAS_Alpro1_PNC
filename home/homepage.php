<html>
    <head>
        <title>UAS TI A</title>
    </head>
    <body>
        <div class="homepage-container">
            <h3>UMKM Politeknik Negeri Cilacap</h3>
            <p>Welcome!</p>
            <form method="POST">
                <input type="submit" name="tambah" value="Tambah Barang">
                <input type="submit" name="hapus" value="Hapus Barang">
                <input type="submit" name="cari" value="Cari Barang">
            </form>
            <form method="POST" action="../data/process-barang.php">
                <input type="submit" name="tampil" value="Tampil Barang">
            </form>

            <form action="logout.php" method="post">
                <button type="submit">Logout</button>
        </div>

        <?php
            if (isset($_POST['tambah'])) {
                header('Location: ../data/form-tambah-barang.php');
                exit();
            } else if (isset($_POST['hapus'])) {
                header('Location: ../data/form-hapus-barang.php');
                exit();
            } else if (isset($_POST['cari'])) {
                header('Location: ../data/form-cari-barang.php');
                exit();
            } 
            // else if (isset($_POST['tampil'])) {
            //     header('Location: ../data/form-tampil-barang.php');
            //     exit();
            // }
        ?>
    </body>
</html>