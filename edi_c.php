<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>選択画面</title>
</head>
<body>
<?php
session_start(); //accept from other page
$id = $_SESSION["id_l"];

echo '<p>編集したい予定を選択してください。</p>';
echo '<form>';

//connect database, and get data
$pdo = new PDO("mysql:dbname=poppo","poppo","poppo.");
$sql = 'SELECT count, date, schedule FROM schedule WHERE datediff(date, current_date()) >= 0 AND id = ? ORDER BY date;';
$st = $pdo -> prepare($sql);
$data = array($id);
$st -> execute($data);

//get data ,and print them 
while($row = $st -> fetch()){ //get data
$count = htmlspecialchars($row['count']);
$schedule = htmlspecialchars($row['schedule']);

echo '<input type = "radio" name = "choice" value ='.$count;
 "10代"> <label>10代</label>>';

echo $hour;

if(($min <= 0) && ($min < 10)){ //0分～9分は先頭に"0"をつけて表現する
echo ":0";}
else{
echo ":";}

echo $min."</td><td>".$schedule."</td></tr>";}

if($row == false){ //該当するレコードがなければ
echo "<tr><td> </td></tr>";}

echo '</table>';

//print future's schedule
echo '<div style = "float: right;">'; //右寄りで描写
//題目（明日からの予定）に点線を引いてみた　＋　題目までに右から2bitほどスペース確保
echo '<h1>&nbsp;&nbsp;<span class style = "border-bottom: dashed 2px #FF8C00;">明日からの予定</span>&nbsp;&nbsp;</h1>';
echo '<div class = "frame">';

//prepare in order to get data about future's schedule
$sql = 'SELECT date, schedule FROM schedule WHERE datediff(date, current_date()) > 0 AND id = ? ORDER BY date;';
$stf = $pdo -> prepare($sql);
$stf -> execute($data);

//get data ,and print them 
echo '<table cellpadding = "5">';

while($rowf = $stf -> fetch()){ //get data
$date = htmlspecialchars($rowf['date']);
$schedule = nl2br(htmlspecialchars($rowf['schedule']));

echo '<tr><td valign = "top">'.$date."</td><td>".$schedule."</td></tr>";}

if($row == false){ //該当するレコードがなければ
echo "<tr><td> </td></tr>";}

echo '</table>';
echo '</div></div>';
?>
</body>
</html>
