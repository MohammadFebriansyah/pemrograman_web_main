<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "Hasil Penjumlahan: $hasilTambah <br>";
echo "Hasil Pengurangan: $hasilKurang <br>";
echo "Hasil Perkalian: $hasilKali <br>";
echo "Hasil Pembagian: $hasilBagi <br>";
echo "Sisa Bagi: $sisaBagi <br>";
echo "Pangkat: $pangkat <br>";

echo "Hasil Sama: ";
var_dump($hasilSama);
echo "<br>";

echo "Hasil Tidak Sama: ";
var_dump($hasilTidakSama);
echo "<br>";

echo "Hasil Lebih Kecil: ";
var_dump($hasilLebihKecil);
echo "<br>";

echo "Hasil Lebih Besar: ";
var_dump($hasilLebihBesar);
echo "<br>";

echo "Hasil Lebih Kecil Sama: ";
var_dump($hasilLebihKecilSama);
echo "<br>";

echo "Hasil Lebih Besar Sama: ";
var_dump($hasilLebihBesarSama);
echo "<br>";

echo "Hasil Operasi AND: ";
var_dump($hasilAnd);
echo "<br>";

echo "Hasil Operasi OR: ";
var_dump($hasilOr);
echo "<br>";

echo "Hasil Operasi NOT untuk a: ";
var_dump($hasilNotA);
echo "<br>";

echo "Hasil Operasi NOT untuk b: ";
var_dump($hasilNotB);
echo "<br>";

$a += $b;
echo "Hasil Penambahan: $a <br>";
$a -= $b;
echo "Hasil Pengurangan: $a <br>";
$a *= $b;
echo "Hasil Perkalian: $a <br>";
$a /= $b;
echo "Hasil Pembagian: $a <br>";
$a %= $b;
echo "Sisa Bagi: $a <br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "Hasil Identik ( === ): ";
var_dump($hasilIdentik);
echo "<br>";

echo "Hasil Tidak Identik ( !== ): ";
var_dump($hasilTidakIdentik);
echo "<br>";
?>