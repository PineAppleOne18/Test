<?php
require "config.php";
$message = '';

function createUser($conn) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $patronymic = $_POST['patronymic'];

    $sql = "INSERT INTO insurance_user (username, password, last_name, first_name, patronymic) VALUES ('$username', '$password', '$last_name', '$first_name', '$patronymic')";
    $checkUnique = "SELECT * FROM insurance_user WHERE username='$username'";

    if ($conn->query($checkUnique)->num_rows > 0) {
        $GLOBALS['message'] = "Аккаунт с таким логином уже существует!";
        $_SESSION['username'] = $username;
        return;
    }

    if ($conn->query($sql)) {
        $GLOBALS['message'] = "Регистрация успешна! Вход в аккаунт осуществлён автоматически. <a href='me.php'>Перейти в личный кабинет</a>.";
    }
}

if (isset($_POST['signup'])) {
    createUser($conn);
}

?>
<html>
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    </head> 
    <body>
        <div class="message">
            <?php echo $message; ?>
        </div>
        <form method="post" class="form">
            <h2>Регистрация</h2>
            <label>
                Логин
                <input type="text" name="username" required>
            </label>
            <label>
                Фамилия
                <input type="text" name="last_name" required>
            </label>
            <label>
                Имя
                <input type="text" name="first_name" required>
            </label>
            <label>
                Отчество
                <input type="text" name="patronymic" required>
            </label>
            <label>
                Пароль
                <input type="password" name="password" required>
            </label>
            <input type="submit" value="Зарегистрироваться" name="signup">
        </form>
    </body>
</html>