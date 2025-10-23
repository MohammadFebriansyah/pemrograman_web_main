<?php
// Lokasi penyimpanan file yang diunggah
$targetDirectory = "upload/";

// Periksa apakah direktori penyimpanan ada, jika tidak maka buat
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

if ($_FILES['images'] && $_FILES['images']['name'][0]) {
    $totalFiles = count($_FILES['images']['name']);

    // Loop melalui semua gambar yang diunggah
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['images']['name'][$i];
        $targetFile = $targetDirectory . $fileName;
        
        // Pindahkan gambar yang diunggah ke direktori penyimpanan
        if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $targetFile)) {
            echo "Gambar $fileName berhasil diunggah.<br>";
        } 
        else {
            echo "Gagal mengunggah gambar $fileName.<br>";
        }
    }
} 
else {
    echo "Tidak ada gambar yang diunggah.";
}
?>