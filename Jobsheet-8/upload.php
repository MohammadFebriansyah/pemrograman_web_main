<?php
 if (isset($_POST["submit"])) {
    $targetDirectory = "uploads/"; // Direktori tujuan untuk menyimpan file
    $targetFile = $targetDirectory . basename($_FILES["myfile"]["name"]); 
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $maxSize = 5* 1024* 1024;
    
    if (in_array($fileType, $allowedExtensions) && $_FILES["myfile"]["size"] <= $maxSize) { 
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFile)) { 
            echo "File berhasil diunggah.";
            echo '<br><br><img src="' . $targetFile . '" width="200" alt="Thumnail">';
        } else {
            echo "Gagal mengunggah file.";
        }
    } else {
        echo "File tidak valid atau melebihi ukuran maksimum yang diizinkan.";
    }
}
?>