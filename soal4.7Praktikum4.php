<?php
$hargaProduk = 120000;
$diskonPersen = 20;
$batasDiskon = 100000;

if ($hargaProduk > $batasDiskon) {
    $diskon = ($diskonPersen / 100) * $hargaProduk;
    $hargaSetelahDiskon = $hargaProduk - $diskon;
} else {
    $hargaSetelahDiskon = $hargaProduk;
}
echo "Harga yang harus dibayar setelah mendapatkan diskon adalah: Rp " . number_format($hargaSetelahDiskon, 2);
?>