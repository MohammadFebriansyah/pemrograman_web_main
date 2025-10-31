<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $konten = $_POST['konten'];
    $gambar = $_POST['gambar'];
    $tanggal = date("Y-m-d");

    $query = "INSERT INTO artikel (judul, penulis, konten, gambar, tanggal_publikasi) VALUES ($1, $2, $3, $4, $5)";
    $result = pg_query_params($conn, $query, array($judul, $penulis, $konten, $gambar, $tanggal));

    if ($result) {
        header("Location: admin.php"); // kembali ke dashboard admin
        exit;
    } else {
        echo "Gagal menambahkan artikel.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Artikel</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            max-width: 600px;
            background: white;
            margin: 50px auto;
            padding: 20px;
            border: 2px solid #132440;
            border-radius: 10px;
        }

        label {
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 10px;
        }

        button {
            background-color: #132440;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
        }

        button:hover {
            background-color: #2a4a7a;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Tambah Artikel Baru</h2>
        <form method="POST">
            <label>Judul Artikel</label>
            <input type="text" name="judul" required>

            <label>Penulis</label>
            <input type="text" name="penulis" required>

            <label>URL Gambar</label>
            <input type="text" name="gambar" required>

            <label>Konten Artikel</label>
            <textarea name="konten" rows="6" required></textarea>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>

</html>