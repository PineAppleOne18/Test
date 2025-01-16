<?php
require "config.php";
$message = '';

function logUserIn($conn) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM insurance_user WHERE username='$username' AND password='$password'";
    
    if ($conn->query($sql)->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: me.php");
        return;
    }
    $GLOBALS['message'] = "Пароль неверный или аккаунта с таким логином не существует.";
}

if (isset($_POST['signin'])) {
    logUserIn($conn);
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
            <h2>Авторизация</h2>
            <label>
                Логин
                <input type="text" name="username" required>
            </label>
            <label>
                Пароль
                <input type="password" name="password" required>
            </label>
            <input type="submit" value="Войти" name="signin">
        </form>
    </body>
</html>