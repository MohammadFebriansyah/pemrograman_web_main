<?php
function perkenalan ($nama, $salam) {
    echo $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}
 
perkenalan ("Ansyah", "Hallo");

echo "<hr>";

$saya = "Febri";
$ucapanSalam = "Selamat pagi";

perkenalan ($saya, $ucapanSalam);
?>