<?php
$input = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["input"])) {
        $input = $_POST["input"];
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        echo "Input setelah sanitasi: " . $input;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Input</title>
</head>
<body>
    <h2>Form Input PHP</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="input">Input :</label>
        <input type="text" name="input" id="input" value="<?= $input; ?>"><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>