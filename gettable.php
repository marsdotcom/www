<?php

    include "conectSQL.php";

 $table = $_POST['table'];


if (isset($_POST['id'])){
    
    $sql = "SELECT * FROM  ".$table." where id=".$_POST['id'];
    $stmt = $mysqli->stmt_init();
            if(($stmt->prepare($sql) === FALSE)
               // or ($stmt->bind_param('s', $table) === FALSE)
                or ($stmt->execute() === FALSE)       // получение буферизированного результата в виде mysqli_result,
                or (($result = $stmt->get_result()) === FALSE)
                or ($stmt->close() === FALSE)) {
                                                die('Select Error (' . $stmt->errno . ') ' . $stmt->error);
                                                }

   $row = $result->fetch_assoc(); 
    
    echo 'Фамилия:<input type="text" name="fam" value='.$row['fam'].'><br>
         Имя:<input type="text" name="name" value='.$row['name'].'><br>
        Ник:<input type="text" name="nic" value='.$row['nic'].'><br>
        Телефон:<input type="text" name="tel" value='.$row['tel'].'><br>
        Эл.почта:<input type="text" name="mail" value='.$row['mail'].'><br> ';
    
}else{

    $sql = "SELECT * FROM  ".$table;
    $stmt = $mysqli->stmt_init();
            if(($stmt->prepare($sql) === FALSE)
               // or ($stmt->bind_param('s', $table) === FALSE)
                or ($stmt->execute() === FALSE)       // получение буферизированного результата в виде mysqli_result,
                or (($result = $stmt->get_result()) === FALSE)
                or ($stmt->close() === FALSE)) {
                                                die('Select Error (' . $stmt->errno . ') ' . $stmt->error);
                                                }
    $field_cnt = $result->field_count;
    if($table=="workers") $table="Работники";
    echo "<h1>".$table."</h1>";
    echo "<table>";
    while ($row = $result->fetch_row()) {
        echo "<tr>";
    for($i=0; $i<$field_cnt; $i++){
        echo "<td>".$row[$i]."<td>";
    }
        echo "<td><button name='bbb' value='$row[0]'>изменить</button></td>";
        echo "</tr>";
    }
    echo "</table>";
}
    $result->close();
    $mysqli->close();  
?>