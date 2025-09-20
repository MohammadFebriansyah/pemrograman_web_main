<?php
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
$nilaiTertinggil = $nilaiSiswa[0];
$nilaiTertinggi2 = $nilaiSiswa[0];
$nilaiTerendah1 = $nilaiSiswa[0];
$nilaiTerendah2 = $nilaiSiswa[0];
$total = 0;
$banyak = 0;
$rataRata = 0;

foreach ($nilaiSiswa as $n) {
    if ($n > $nilaiTertinggil) {
        $nilaiTertinggil = $n;
    }
}
echo "Nilai tertinggi pertama: $nilaiTertinggil <br>";

foreach ($nilaiSiswa as $n) {
    if ($n == $nilaiTertinggil) {
        continue;
    } elseif ($n > $nilaiTertinggi2) {
        $nilaiTertinggi2 = $n;
    }
}
echo "Nilai tertinggi kedua: $nilaiTertinggi2 <br>";

foreach ($nilaiSiswa as $n) {
    if ($n < $nilaiTerendah1) {
        $nilaiTerendah1 = $n;
    }
}
echo "Nilai terendah pertama: $nilaiTerendah1 <br>";

foreach ($nilaiSiswa as $n) {
    if ($n == $nilaiTerendah1) {
        continue;
    } elseif ($n < $nilaiTerendah2) {
        $nilaiTerendah2 = $n;
    }
}
echo "Nilai terendah kedua: $nilaiTerendah2 <br>";

foreach ($nilaiSiswa as $n) {
    if ($n == $nilaiTertinggil || $n == $nilaiTertinggi2 || $n == $nilaiTerendah1 || $n == $nilaiTerendah2) {
        continue;
    }
    $banyak++;
    $total += $n;
}
$rataRata = $total / $banyak;

echo "Total nilai: $total<br>";
echo "Nilai Rata-Rata setelah mengabaikan 2 nilai tertinggi dan 2 nilai terendah: $rataRata";
?>