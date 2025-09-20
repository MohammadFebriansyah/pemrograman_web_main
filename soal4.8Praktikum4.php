<?php
$skorPemain = 800;
$totalSkor = $skorPemain;

$mendapatkanHadiahTambahan = ($totalSkor > 500) ? "YA" : "TIDAK";

echo "Total skor pemain adalah: $totalSkor <br>";
echo "Apakah pemain mendapatkan hadiah tambahan? $mendapatkanHadiahTambahan";
?>