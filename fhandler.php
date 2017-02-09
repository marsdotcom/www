<?php

include "conectSQL.php";

$fam = $_POST["fam"];
$name = $_POST["name"];
$nic = $_POST["nic"];
$tel = $_POST["tel"];            
$mail = $_POST["mail"];  

if (!isset($_POST['id'])){ 

    $stmt = $mysqli->stmt_init();       
    if(($stmt->prepare("INSERT INTO workers (fam,name,nic,tel,mail) VALUES (?,?,?,?,?)") === FALSE) 
        or ($stmt->bind_param('sssss', $fam, $name,$nic,$tel,$mail) === FALSE)
        or ($stmt->execute() === FALSE)       // получение буферизированного результата в виде mysqli_result,
        or ($stmt->close() === FALSE)) {
        die('Select Error (' . $stmt->errno . ') ' . $stmt->error);
    }
    else echo "Сохранено.";

}else{

    $id = $_POST['id'];
    $stmt = $mysqli->stmt_init();

    if (isset($_POST['del'])){

         if(($stmt->prepare("DELETE FROM workers WHERE id = ? ") === FALSE) 
            or ($stmt->bind_param('s',$id) === FALSE)
            or ($stmt->execute() === FALSE)       // получение буферизированного результата в виде mysqli_result,
            or ($stmt->close() === FALSE)) {
            die('Select Error (' . $stmt->errno . ') ' . $stmt->error);
    }
    else echo "Удалено.";    

    }else{

            if(($stmt->prepare("UPDATE  workers set fam=? ,name=? , nic=? , tel=? , mail=? WHERE id=? ") === FALSE) 
                or ($stmt->bind_param('sssssi', $fam, $name,$nic,$tel,$mail,$id) === FALSE)
                or ($stmt->execute() === FALSE)       // получение буферизированного результата в виде mysqli_result,
                or ($stmt->close() === FALSE)) {
                die('Select Error (' . $stmt->errno . ') ' . $stmt->error);
            }
            else echo "Изменено.";   
    } 


}


?>