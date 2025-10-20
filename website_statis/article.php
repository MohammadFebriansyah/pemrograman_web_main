<?php
include 'koneksi.php';

$id = $_GET['id'] ?? 1; 

$query = "SELECT * FROM artikel WHERE id = $1";
$result = pg_query_params($conn, $query, array($id));

if (!$result || pg_num_rows($result) == 0) {
    echo "Artikel tidak ditemukan.";
    exit;
}

$data = pg_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo htmlspecialchars($data['judul']); ?></title>
    <style>
      body {
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
      }
      header {
        background-color: #132440;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        position: sticky;
        top: 0;
      }
      header a {
        text-decoration: none;
        color: white;
      }
      .container {
        max-width: 60%;
        margin: 30px auto;
        background-color: white;
        padding: 30px;
        border: 2px solid #132440;
        border-radius: 5px;
      }
      .article-image {
        width: 100%;
        height: 530px;
        object-fit: cover;
        border-radius: 5px;
        margin-bottom: 20px;
      }
      .article-meta {
        color: #888;
        font-size: 14px;
        margin-bottom: 20px;
      }
      .article-content {
        line-height: 1.6;
        color: black;
        text-align: justify;
      }
      footer {
        background-color: #132440;
        color: white;
        text-align: center;
        padding: 20px;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Blog Saya</h1>
      <a href="index.php">Kembali</a>
    </header>

    <div class="container">
      <img src="<?php echo htmlspecialchars($data['gambar']); ?>" alt="Gambar Artikel" class="article-image" />

      <h1><?php echo htmlspecialchars($data['judul']); ?></h1>

      <div class="article-meta">
        Ditulis oleh: <?php echo htmlspecialchars($data['penulis']); ?> | 
        <?php echo date("d F Y", strtotime($data['tanggal_publikasi'])); ?>
      </div>

      <div class="article-content">
        <p><?php echo nl2br(htmlspecialchars($data['konten'])); ?></p>
      </div>
    </div>

    <footer>
      <p>&copy; 2025 Mohammad Febriansyah</p>
    </footer>
  </body>
</html>
