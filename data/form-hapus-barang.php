<html>
    <head>
        <title>UAS TI A</title>
    </head>
    <body>
        <h3>UMKM Politeknik Negeri Cilacap</h3>
        <p>Hapus Barang</p>
        <form method="POST" action="process-barang.php">
            <input type="text" name="nama-barang" placeholder="Nama Barang" onclick="this.select()">
            <button type="submit" name="hapus">Hapus Barang</button>
        </form>

        <form method="POST" action="back-dashboard.php">
            <button type="submit">Kembali</button>
        </form>
    </body>
</html>