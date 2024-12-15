<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Осминин П.Г.</title>
</head>
<body>
    <h1>Авторизация</h1>
    <form method="POST" action="login.php">
        <input class="form" type="text" name="login" placeholder="Login">
        <input class="form" type="password" name="password" placeholder="Password">
        <button type="submit" name="submit">Продолжить</button>
    </form>
</body>
</html>
<?php
    require_once('db.php');

    $link = mysqli_connect('127.0.0.1', 'root', '12345', 'ascs');

    if (isset($_POST['submit'])) {
        $username = $_POST['login'];
        $password = $_POST['password'];

        if (!$username || !$password) die('Нужно ввести все значения.');
        
        $sql = "SELECT * FROM users WHERE username='$username' AND pass='$password'";

        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            setcookie('username', $username, time()+3600);
            header('Location: welcome.php');
        } else {
            echo "Неверное имя или пароль";
        }
          
    }
?>
