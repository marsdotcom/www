<html>
<head>
<title>Страница с примером передачи переменных с помощью Post</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<form method="post" action="parser.php">Заполняем поле для передачи информации:<br><br>
 Укажите адрес сайта: <input name="user_name" type="text" maxlength="60" size="75" value="" />
 <br><br> <input type=submit formaction="parser.php" value="Передать информацию"></form>
<?php
//phpinfo();
/*if (!empty($_POST["user_name"])){
$ch = curl_init();
$url = $_POST["user_name"];
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HEADER, 1); // читать заголовок
curl_setopt($ch, CURLOPT_NOBODY, 1); // читать ТОЛЬКО заголовок без тела
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);  
curl_close($ch);
echo $result;
}*/
// else{ echo 'Скунс не ввел адрес сайта';}
$content = file_get_contents($_POST["user_name"]);
$start="content=\"АСШ№1-выпуск97,";
$finish="фирма веников не вяжет\"";
$rrr=strpos($content,$start);
if ($rrr===false){echo "Вхождений не найдено.";}
$first=substr($content,$rrr+strlen($start));
$second=substr($first,0,strpos($first,$finish));
echo $second;
?>
</body>
</html>
