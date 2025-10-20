<?php
$host = "localhost";
$port = "5432";
$dbname = "db_artikel";
$user = "postgres";    
$password = "12345678";  

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Koneksi ke database gagal: " . pg_last_error());
}

pg_set_client_encoding($conn, 'UTF8')
?>