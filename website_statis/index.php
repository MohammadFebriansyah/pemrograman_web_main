<!DOCTYPE html>
<html>

<head>
  <title>Blog Saya - Beranda</title>
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
      /* atur posisi */
      display: flex;
      flex-direction: row;
      /* jarak horizontal */
      justify-content: space-between;
      /* jark vertikal */
      align-items: center;
      /* jarak dalam navbar vertical horizontal */
      padding: 10px 20px;
      /* posisi navbar */
      position: sticky;
      top: 0;
      left: 0;
      right: 0;
      z-index: 99;
    }

    header a {
      text-decoration: none;
      color: white;
    }

    .hero {
      background: linear-gradient(135deg, #132440 0%, #2a4a7a 100%);
      color: white;
      text-align: center;
      padding: 60px 20px;
    }

    .hero h2 {
      font-size: 2.5em;
      margin-bottom: 10px;
    }

    .hero p {
      font-size: 1.2em;
      opacity: 0.9;
    }

    .container {
      max-width: 1200px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .articles-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
      gap: 30px;
      margin-top: 30px;
    }

    .article-card {
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
      cursor: pointer;
      opacity: 0;
      transform: translateY(30px);
    }

    .article-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .article-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
    }

    .article-card-content {
      padding: 20px;
    }

    .article-card-title {
      font-size: 1.3em;
      margin-bottom: 10px;
      color: #132440;
      font-weight: bold;
    }

    .article-card-meta {
      color: #888;
      font-size: 0.9em;
      margin-bottom: 15px;
    }

    .article-card-excerpt {
      color: #555;
      line-height: 1.6;
      margin-bottom: 15px;
      text-align: justify;
    }

    .read-more {
      display: inline-block;
      color: #132440;
      font-weight: bold;
      text-decoration: none;
      transition: color 0.3s;
    }

    .read-more:hover {
      color: #2a4a7a;
    }

    footer {
      background-color: #132440;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 60px;
    }
  </style>
</head>

<body>
  <header>
    <h1>Blog Saya</h1>
    <a href="admin.php" class="admin-page-link">Admin Page</a>
    <a href="profile.php" class="profile-link">Profile Saya</a>
  </header>

  <div class="hero">
    <h2>Selamat Datang di Blog Saya</h2>
    <p>Temukan berbagai artikel menarik seputar esports dan teknologi</p>
  </div>

  <div class="container">
    <!-- <h2 style="color: #132440; margin-bottom: 10px">Artikel Terbaru</h2> -->
    <div class="articles-grid">
      <?php
      include 'koneksi.php';

      $query = "SELECT * FROM artikel ORDER BY tanggal_publikasi DESC";
      $result = pg_query($conn, $query);

      if (!$result) {
        echo "<p>Gagal mengambil data artikel.</p>";
      } else {
        while ($row = pg_fetch_assoc($result)) {
          echo '
          <div class="article-card" onclick="window.location.href=\'article.php?id=' . $row["id"] . '\'">
            <img src="' . htmlspecialchars($row["gambar"]) . '" alt="' . htmlspecialchars($row["judul"]) . '" />
            <div class="article-card-content">
              <h3 class="article-card-title">' . htmlspecialchars($row["judul"]) . '</h3>
              <div class="article-card-meta">
                Ditulis oleh: ' . htmlspecialchars($row["penulis"]) . ' | ' . htmlspecialchars($row["tanggal_publikasi"]) . '
              </div>
              <p class="article-card-excerpt">' . substr(htmlspecialchars($row["konten"]), 0, 150) . '...</p>
              <a href="artikel.php?id=' . $row["id"] . '" class="read-more">Baca Selengkapnya →</a>
            </div>
          </div>';
        }
      }

      pg_close($conn);
      ?>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Mohammad Febriansyah</p>
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const cards = document.querySelectorAll(".article-card");

      cards.forEach((card) => {
        let opacity = 0;
        let translateY = 30;
        const duration = 500;
        const interval = 16;
        const steps = duration / interval;
        const opacityStep = 1 / steps;
        const translateStep = 30 / steps;

        const animasi = setInterval(() => {
          opacity += opacityStep;
          translateY -= translateStep;
          card.style.opacity = opacity;
          card.style.transform = `translateY(${translateY}px)`;

          if (opacity >= 1) {
            clearInterval(animasi);
            card.style.opacity = 1;
            card.style.transform = "translateY(0)";
          }
        }, interval);
      });
    });
  </script>
</body>

</html>