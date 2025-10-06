<?php
$input = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["input"])) {
        $input = $_POST["input"];
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        echo "Input setelah sanitasi: " . $input;
    }

    if (isset($_POST["email"])) {
        $email = $_POST["email"];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Lanjutkan dengan pengolahan email yang aman
            echo " Email yang valid: " . $email;
        } else {
            // Tangani input yang tidak valid
            echo " Email tidak valid: " . $email;
        }
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
        
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" value="<?= $email; ?>"><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>