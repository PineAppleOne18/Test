<?php
require "config.php";
$message = '';

if (!isset($_SESSION['username'])) {
    die("Вы не авторизованы");
}

function createIssue($conn) {
    $client_id = $_POST['client_id'];
    $type_id = $_POST['type_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $agent_id = $_SESSION['agent_id'];
    $sql = "INSERT INTO insurance_issue (client_id, type_id, start_date, end_date, agent_id) VALUES ($client_id, $type_id, '$start_date', '$end_date', $agent_id)";
    if ($conn->query($sql)) {
        header("Location: me.php");
    }
}

if (isset($_POST['send'])) {
    createIssue($conn);
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
            
            <form class="form" method="post">
                <h1>Добавление договора</h1>
                <label>
                    Клиент
                    <select name="client_id" id="">
                        <option value="1">Леприконов Демиург Семёнович</option>
                    </select>   
                </label>
                <label>
                    Вид страхования
                    <select name="type_id" id="">
                        <option value="1">Медицинский</option>
                        <option value="2">Имущественный</option>
                    </select>   
                </label>
                
                <input type="text" placeholder="Дата начала в формате yyyy-mm-dd" name="start_date" pattern="\d{4}-\d{2}-\d{2}" required>
                <input type="text" placeholder="Дата окончания в формате yyyy-mm-dd" name="end_date" pattern="\d{4}-\d{2}-\d{2}" required>
                <input type="submit" value="Добавить" name="send">
            </form>
            <p>
                <a href="me.php">Назад</a>
            </p>
        </div>
    </body>
</html>