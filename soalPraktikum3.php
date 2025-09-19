<?php
$totalKursi = 45;
$kursiTerisi = 28;

$kursiKosong = $totalKursi - $kursiTerisi;
$persentaseKosong = ($kursiKosong / $totalKursi) * 100;

echo "Jumlah total kursi di restoran: $totalKursi<br>";
echo "Jumlah kursi yang telah ditempati oleh pelanggan: $kursiTerisi<br>";
echo "Jumlah kursi yang masih kosong: $kursiKosong <br>";
echo "Persentase kursi yang masih kosong: " . number_format($persentaseKosong, 2) . "%";
?>