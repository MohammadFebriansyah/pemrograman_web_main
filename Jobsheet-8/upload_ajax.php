<?php
    if (isset($_FILES['files']['name'][0])) {
    $errors = [];

    $totalFiles = count($_FILES['files']['name']);
    for ($i = 0; $i < $totalFiles; $i++) {
        $file_name = $_FILES['files']['name'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        $file_type = $_FILES['files']['type'][$i];
        $file_name_parts = explode('.', $file_name);
        $file_ext = strtolower(end($file_name_parts));
        $extensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($file_ext, $extensions)) {
            $errors[] = 'Ekstensi file yang diizinkan adalah JPG, JPEG, PNG, atau GIF';
        }
        if ($file_size > 2097152) { // 2 MB dalam byte
            $errors[] = 'Ukuran file tidak boleh lebih dari 2 MB';
        }
        if (empty($errors)) {
            move_uploaded_file($file_tmp, 'documents/' . $file_name);
            echo "File $file_name diunggah.<br>";
        } else {
            echo implode(' ', $errors);
        }
    }
} else {
    echo "Tidak ada file yang diunggah";
}
?>