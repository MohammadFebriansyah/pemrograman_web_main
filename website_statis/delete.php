<?php
include 'koneksi.php';

$id = $_GET['id'] ?? 0;

$query = "DELETE FROM artikel WHERE id = $1";
$result = pg_query_params($conn, $query, array($id));

if ($result) {
    header("Location: admin.php");
} else {
    echo "Gagal menghapus artikel";
}
exit;
?>
