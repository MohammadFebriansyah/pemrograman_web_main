<?php
include 'koneksi.php';

$id = $_GET['id'] ?? 0;

$query = "SELECT * FROM artikel WHERE id = $1";
$result = pg_query_params($conn, $query, array($id));
$data = pg_fetch_assoc($result);

if (!$data) {
    echo "Artikel tidak ditemukan.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $konten = $_POST['konten'];
    $gambar = $_POST['gambar'];

    $updateQuery = "UPDATE artikel SET judul = $1, penulis = $2, konten = $3, gambar = $4 WHERE id = $5";
    pg_query_params($conn, $updateQuery, array($judul, $penulis, $konten, $gambar, $id));

    header("Location: artikel.php?id=$id");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Artikel</title>
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

        .btn-cancel {
            margin-left: 10px;
            text-decoration: none;
            color: #132440;
            font-weight: bold;
        }

        .btn-cancel:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Artikel</h2>
        <form method="POST" id="formData">
            <label>Judul Artikel</label>
            <input type="text" name="judul" value="<?php echo htmlspecialchars($data['judul']); ?>" required>

            <label>Penulis</label>
            <input type="text" name="penulis" value="<?php echo htmlspecialchars($data['penulis']); ?>" required>

            <label>URL Gambar</label>
            <input type="text" name="gambar" value="<?php echo htmlspecialchars($data['gambar']); ?>" required>

            <label>Konten Artikel</label>
            <textarea name="konten" rows="6" required><?php echo htmlspecialchars($data['konten']); ?></textarea>

            <button type="submit">Simpan Perubahan</button>
            <a href="admin.php" class="btn-cancel">Batal</a>
        </form>
    </div>

    <script>
        $('#formData').submit(function (e) { 
            e.preventDefault();
            
            var data = this.serialize();

            $.ajax({
                type: "POST",
                url: "",
                data: "data",
                dataType: "dataType",
                success: function (response) {
                    
                }
            });
        });
    </script>
</body>
</html>
