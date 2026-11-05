<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>

    <h2>Form Tambah Buku</h2>

    <form action="proses.php" method="POST">

        <label>Judul Buku:</label><br>
        <input type="text" name="judul" required>
        <br><br>

        <label>Tahun Terbit:</label><br>
        <input type="number" name="tahun"
               min="1900" max="<?php echo date('Y'); ?>"
               required>
        <br><br>

        <button type="submit">Simpan</button>

    </form>

</body>
</html>