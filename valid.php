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
                   
            $sql = "select * from users where log = '$log'  and pass = '$pass' ";
        
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0){
           
                echo "login and password is correct";
            }else {
                echo "login or password is incorrect";
            }
        
            $result->close();
            $conn->close();
           
        ?>    
    </body>
</html>