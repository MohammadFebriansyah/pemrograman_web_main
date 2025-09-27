<?php
//membuat fungsi
function perkenalan($nama, $salam="Assalamualaikum"){
    echo $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}
//memanggil fungsi yang sudah dibuat
perkenalan("Ansyah","Hallo");

echo "<hr>";

$saya = "Febri";
$ucapanSalam = "Selamat pagi";

//memanggil lagi
perkenalan($saya) ;
?>