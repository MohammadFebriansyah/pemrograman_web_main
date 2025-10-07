<?php
$pattern = '/[a-z]/'; // Cocokkan huruf kecil.
$text = 'This is a Sample Text.';
if (preg_match($pattern, $text)) { 
    echo "Huruf kecil ditemukan!";
} else { 
    echo "Tidak ada huruf kecil!";
}
echo "<br>";
?>

<?php // kode tambahan pada langkah 6
$pattern = '/[0-9]+/'; // Cocokkan satu atau lebih digit.
$text = 'This are 123 apples.';
if (preg_match($pattern, $text, $matches)) { 
    echo "Cocokkan: " . $matches[0];
} else { 
    echo "Tidak ada yang cocok!";
}
echo "<br>";
?>

<?php // kode tambahan pada langkah 10 
$pattern = '/apple/';
$replacement = 'banana';
$text = 'I like apple pie.';
$new_text = preg_replace($pattern, $replacement, $text);
echo $new_text; // Output: "I like banana pie."
echo "<br>";
?>

<?php // kode tambahan pada langkah 14
$pattern='/go*d/'; // Cocokkan "god", "good", "gooood", dll.
$text = 'god is good.';
if (preg_match($pattern, $text, $matches)) { 
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}
echo "<br>";
?>

<?php // soal 5.5
$pattern = '/go?d/'; // Cocokkan "god" atau "good".
$text = 'god is good.';
if (preg_match($pattern, $text, $matches)) { 
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}
echo "<br>";
?>