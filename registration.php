<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Осминин П.Г.</title>
</head>
    <body>
        <h1>Регистрация</h1>
        <form method="POST" action="registration.php">
            <input class="form" type="email" name="email" placeholder="email">
            <input class="form" type="text" name="login" placeholder="login">
            <input class="form" type="password" name="password" placeholder="password">
            <button type="submit" name="submit">Продолжить</button>
        </form>
    </body>
</html>

<?php
require_once('db.php');
if (isset($_COOKIE['username'])) {
    header("Location: login.php");
}
$link = mysqli_connect('127.0.0.1', 'root', '12345', 'ascs');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $password = $_POST['password'];

    if (!$email || !$username || !$password) die ('Пожалуйста, введите все значения!');

    $sql = "INSERT INTO users (email, username, pass) VALUES ('$email', '$username', '$password')";

    if(!mysqli_query($link, $sql)) {
        echo "Не удалось добавить пользователя";
    }
    else {
        header("Location: login.php");
    }
}

?>