//metode1
<html>
    <head>
        <title>Cara 01</title>
    </head>
    <body>
        <p>Tanggal Hari ini : <?php echo date("d M Y")?></p>
    </body>
</html>
//metode2
<?php
echo '<html>';
echo '<head><title>Cara02</title></head>';
echo '<p>Tanggal Hari ini : '.date('d M Y').'</p>';
echo '</body>';
echo '</html>';
?>