<?php
require "config.php";
$message = '';

if (!isset($_SESSION['username'])) {
    die("Вы не авторизованы");
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM insurance_user WHERE username='$username'";
$res = $conn->query($sql);
if ($res) {
    $row= $res->fetch_assoc();
    $_SESSION['agent_id'] = $row['id'];
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
        <div>
            <p>Добро пожаловать, <?php echo $_SESSION['username']; ?></p>
            <div class="issues">
                <h1>Договоры</h1>
                <?php
                $username = $_SESSION['username'];
                $sql = "SELECT *, insurance_type.type_title, insurance_client.last_name, insurance_client.first_name, insurance_client.patronymic FROM insurance_issue, insurance_client, insurance_type, insurance_user WHERE insurance_issue.client_id=insurance_client.id AND insurance_type.id=insurance_issue.type_id AND insurance_user.id = insurance_issue.agent_id AND insurance_user.username = '$username'";
                $res = $conn->query($sql);
                if ($res->num_rows == 0):
                ?>
                <p>0 договоров</p>
                <?php endif;
                while($row = $res->fetch_assoc()):
                ?>
                <div class="issue">
                    <div class="row">
                        <b>Клиент:</b>
                        <span>
                            <?php echo $row['last_name']; ?>
                            <?php echo $row['first_name']; ?>
                            <?php echo $row['patronymic']; ?>
                        </span>
                    </div>
                    <div class="row">
                        <b>Вид страхования:</b>
                        <span>
                            <?php echo $row['type_title']; ?>
                        </span>
                    </div>
                    <div class="row">
                        <b>Дата начала:</b>
                        <span>
                            <?php echo $row['start_date']; ?>
                        </span>
                    </div>
                    <div class="row">
                        <b>Дата окончания:</b>
                        <span>
                            <?php echo $row['end_date']; ?>
                        </span>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <p>
                <a href="add.php">Добавить договор</a>
            </p>
            <p>
                <a href="logout.php">Выйти</a>
            </p>
        </div>
    </body>
</html>