<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $konten = $_POST['konten'];
    $tanggal = date("Y-m-d");
    
    $gambar = '';
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $target_dir = "images/";
        
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $file_extension = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        
        if (in_array($file_extension, $allowed_extensions)) {
            $new_filename = uniqid() . '_' . time() . '.' . $file_extension;
            $target_file = $target_dir . $new_filename;
            
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
                $gambar = $target_file;
            } else {
                echo "<div class='alert alert-danger'>Gagal mengupload gambar.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Format file tidak diizinkan. Gunakan JPG, JPEG, PNG, atau GIF.</div>";
        }
    }

    if ($gambar !== '') {
        $query = "INSERT INTO artikel (judul, penulis, konten, gambar, tanggal_publikasi) VALUES ($1, $2, $3, $4, $5)";
        $result = pg_query_params($conn, $query, array($judul, $penulis, $konten, $gambar, $tanggal));

        if ($result) {
            header("Location: admin.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Gagal menambahkan artikel.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            padding-top: 50px;
            padding-bottom: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="form-container">
                    <h2 class="text-center">Tambah Artikel Baru</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="judul">Judul Artikel</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>

                        <div class="form-group">
                            <label for="penulis">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis" required>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar Artikel</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*" required>
                                <label class="custom-file-label" for="gambar">Pilih gambar...</label>
                            </div>
                            <small class="form-text text-muted">Format: JPG, JPEG, PNG, atau GIF (Max 5MB)</small>
                            <div id="preview-container">
                                <img id="preview-image" width="200px" src="" alt="Preview">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="konten">Konten Artikel</label>
                            <textarea class="form-control" id="konten" name="konten" rows="6" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Simpan Artikel</button>
                        <a href="admin.php" class="btn btn-secondary btn-block mt-2">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 4 JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        document.getElementById('gambar').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const fileName = file.name;
                const label = document.querySelector('.custom-file-label');
                label.textContent = fileName;
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-image').src = e.target.result;
                    document.getElementById('preview-container').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>