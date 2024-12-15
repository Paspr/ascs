<?php
if (!isset($_COOKIE['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_COOKIE['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Приветствие</title>
</head>
<body>
    <h2>Привет, <?php echo htmlspecialchars($username); ?>!</h2>
    <p><a href="index.php">Выйти</a></p>
</body>
</html>
