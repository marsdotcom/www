<!DOCTYPE html>
<html>
<head>
  <title>spend</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
$dblocation = "localhost";
$dbname = "db";
$dbuser = "admin";
$dbpasswd = "777";
$mysqli = new mysqli($dblocation,$dbuser,$dbpasswd,$dbname);
$mysqli->set_charset("utf8");
if ($mysqli->connect_errno) {
  die('Ошибка соединения: ' . $mysqli->connect_errno);
}
$id_min = 81;
$id_max = 88;
$stmt = $mysqli->stmt_init();
if(
($stmt->prepare("SELECT * FROM Trasact") === FALSE)
or ($stmt->execute() === FALSE)
// получение буферизированного результата в виде mysqli_result,
or (($result = $stmt->get_result()) === FALSE)
or ($stmt->close() === FALSE)
) {
    die('Select Error (' . $stmt->errno . ') ' . $stmt->error);
}
//$row = $result->fetch_row();

//$mysqli->select_db("mmk");
//$result = $mysqli->query("SELECT fam,im FROM imena");
while ($row = $result->fetch_row()) {
printf ("<h1>%s %s %s %s %s</h1>", $row[0], $row[1], $row[2], $row[3], $row[4]);
}
echo $row[0];
//$stmt->close();
$result->close();
$mysqli->close();
?>
</body>
</html>
