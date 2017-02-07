<?php    
if (isset($_COOKIE['log'])){
    
      header("Location: cabinet.php");
      exit;
    
}
  

    if (isset($_POST['log'])){
            $log = $_POST["log"];


            $pass = $_POST["pass"];
        
            include "conectSQL.php";
        
      

            $stmt = $mysqli->stmt_init();
            if(($stmt->prepare("SELECT * FROM users WHERE log=? AND pass=?") === FALSE)
                or ($stmt->bind_param('ss', $log, $pass) === FALSE)
                or ($stmt->execute() === FALSE)       // получение буферизированного результата в виде mysqli_result,
                or (($result = $stmt->get_result()) === FALSE)
                or ($stmt->close() === FALSE)) {
                                                die('Select Error (' . $stmt->errno . ') ' . $stmt->error);
                                                }
            if($result->num_rows==0) echo "Пароль неверный.";
            else {
                    $row = $result->fetch_assoc();                   
                    setcookie("log", $row["log"]);
                    header("Location: cabinet.php");
                    exit;
            }            
            $result->close();
            $mysqli->close();
    }
        
           
        ?>    
<!DOCTYPE html>
<html>
    <head>
        <title>вход</title>
        <link rel="shortcut icon" href="image/logo_100_100.png" type="image/x-icon">
        <meta charset="utf-8">    
        <script src="jquery-3.1.1.js"></script>
        <style> 
            body{
                background: #b7b2b2;
                
            }
            .view {
                    padding: 10px;
                    width: 250px;
                    height: 100px;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    margin: -50px 0 0 -125px;                    
                    box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.25), 7px 7px 5px rgba(0, 0, 0, 0.22);
                    background: #453e3e;
                text-align: center;
                                }
        </style>
    </head>
    <body>
        <div class="view">
            <form method="post">
                    Аутентификация<br>
                    логин:<input type="text" name="log"><br>
                    пароль:<input type="password" name="pass"><br>
                    <input type="submit" value="войти">
            </form>
        </div>
    </body>
</html>
