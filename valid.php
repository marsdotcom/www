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
            echo $log;
        echo $pass;
            $dblocation = "localhost";
            $dbname = "db";
            $dbuser = "admin";
            $dbpasswd = "777";
            $conn = new mysqli($dblocation,$dbuser,$dbpasswd,$dbname);
           
                if ($conn->connect_errno) {
              die('Ошибка соединения: ' . $mysqli->connect_errno);
                }
           
        
            if(
            ($stmt->prepare("SELECT pass FROM users WHERE log = '$log'") === FALSE)
            or ($stmt->execute() === FALSE)
            // получение буферизированного результата в виде mysqli_result,
            or (($result = $stmt->get_result()) === FALSE)
            or ($stmt->close() === FALSE)
            ) {
                die('Select Error (' . $stmt->errno . ') ' . $stmt->error);
            }
        
            $result->close();
           
        ?>    
    </body>
</html>