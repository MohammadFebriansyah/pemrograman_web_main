<?php
$daftarNilai = [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
    ['David', 64],
    ['Eva', 90],
];

$totalNilai = 0;
$jumlahSiswa = 0;

foreach ($daftarNilai as $siswa) {
    $totalNilai += $siswa[1];
    $jumlahSiswa++;
}
$rataRatakelas = $totalNilai / $jumlahSiswa;

echo "Daftar nilai siswa di atas rata-rata kelas ($rataRatakelas): <br>";

foreach ($daftarNilai as $siswa) {
    $nama = $siswa[0];
    $nilai = $siswa[1];
    if ($nilai > $rataRatakelas) {
        echo "Nama: $nama, Nilai: $nilai <br>";
    }
}
?>