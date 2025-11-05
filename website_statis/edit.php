<?php
include 'koneksi.php';

$id = $_GET['id'] ?? 0;

$query = "SELECT * FROM artikel WHERE id = $1";
$result = pg_query_params($conn, $query, array($id));
$data = pg_fetch_assoc($result);

if (!$data) {
    echo "<div class='alert alert-danger'>Artikel tidak ditemukan.</div>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $konten = $_POST['konten'];
    $gambar = $data['gambar'];

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
                if (file_exists($data['gambar'])) {
                    unlink($data['gambar']);
                }
                $gambar = $target_file;
            }
        }
    }

    $updateQuery = "UPDATE artikel SET judul = $1, penulis = $2, konten = $3, gambar = $4 WHERE id = $5";
    $updateResult = pg_query_params($conn, $updateQuery, array($judul, $penulis, $konten, $gambar, $id));

    if ($updateResult) {
        header("Location: artikel.php?id=$id");
        exit;
    } else {
        $error_message = "Gagal mengupdate artikel.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
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
                    <h2 class="text-center">Edit Artikel</h2>

                    <?php if (isset($error_message)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $error_message; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="judul">Judul Artikel</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                value="<?php echo htmlspecialchars($data['judul']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="penulis">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis"
                                value="<?php echo htmlspecialchars($data['penulis']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar Artikel</label>

                            <!-- Tampilkan gambar saat ini -->
                            <?php if (!empty($data['gambar'])): ?>
                                <div class="mb-2">
                                    <small class="text-muted">Gambar saat ini:</small>
                                    <br>
                                    <img src="<?php echo htmlspecialchars($data['gambar']); ?>"
                                        class="current-image" width="200px" alt="Current Image">
                                </div>
                            <?php endif; ?>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*">
                                <label class="custom-file-label" for="gambar">Pilih gambar baru (opsional)...</label>
                            </div>
                            <small class="form-text text-muted">
                                Format: JPG, JPEG, PNG, atau GIF. Kosongkan jika tidak ingin mengubah gambar.
                            </small>

                            <div id="preview-container" style="display: none;">
                                <small class="text-muted">Preview gambar baru:</small>
                                <br>
                                <img id="preview-image" width="200px" src="" alt="Preview">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="konten">Konten Artikel</label>
                            <textarea class="form-control" id="konten" name="konten" rows="6" required><?php echo htmlspecialchars($data['konten']); ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                        <a href="admin.php" class="btn btn-secondary btn-block mt-2">Batal</a>
                        <a href="artikel.php?id=<?php echo $id; ?>" class="btn btn-outline-secondary btn-block mt-2">Lihat Artikel</a>
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
        // Preview gambar baru sebelum upload
        document.getElementById('gambar').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Update label dengan nama file
                const fileName = file.name;
                const label = document.querySelector('.custom-file-label');
                label.textContent = fileName;

                // Preview gambar
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