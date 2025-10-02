<!DOCTYPE html>
<html>
<head
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Dosen</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
        $Dosen = [
            'nama' => 'Elok Nur Hamdana',
            'domisili' => 'Malang',
            'jenis_kelamin' => 'Perempuan' ];
    ?>
    <table>
        <tr>
            <th>Detail Dosen</th>
            <th>Informasi</th>
        </tr>
        <?php foreach ($Dosen as $key => $value) { ?>
            <tr>
                <td> <?php echo $key; ?></td>
                <td> <?php echo $value; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>