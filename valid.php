<!DOCTYPE html>
<html>
    <head>
        <title>личный кабинет</title>
        <link rel="shortcut icon" href="image/logo_100_100.png" type="image/x-icon">
        <meta charset="utf-8">        
        <script src="jquery-3.1.1.js"></script>
    </head>
    <body>
        <?php
            $log = $_POST["log"];
            $pass = $_POST["pass"];
            echo $pass;
            $dblocation = "hedbed.mysql";
            $dbname = "hedbed_db";
            $dbuser = "hedbed_mysql";
            $dbpasswd = "BCwU_1OO";
            $mysqli = new mysqli($dblocation,$dbuser,$dbpasswd,$dbname);
            $mysqli->set_charset("utf8");
                if ($mysqli->connect_errno) {
              die('Ошибка соединения: ' . $mysqli->connect_errno);
                }
            $stmt = $mysqli->stmt_init();
           
        
            if(
            ($stmt->prepare("SELECT pass FROM users WHERE log = '$log'") === FALSE)
            or ($stmt->execute() === FALSE)
            // получение буферизированного результата в виде mysqli_result,
            or (($result = $stmt->get_result()) === FALSE)
            or ($stmt->close() === FALSE)
            ) {
                die('Select Error (' . $stmt->errno . ') ' . $stmt->error);
            }
            $row = $result->fetch_row();
            if ($row[0]==$pass) echo "Верный пароль";
            else echo "Неверный пароль";
        
            $result->close();
            $mysqli->close();
           
        ?>    
    </body>
</html>