<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>TOP</title>
<!--add css-->
<link href = "css/sche.css" rel = "stylesheet">
</head>
<body>
<?php
session_start(); //give for other page
$name = $_SESSION["name_l"];
$id = $_SESSION["id_l"];

//print welcome message and buttons
echo '<p>ようこそ、'.$name.'さん</p>';
echo '<table cellpadding = "5">'; //ボタンを横に2つ並べる
echo '<tr>';
echo '<td><form action = "nyuryoku.html" method="post" >';
echo '<input type = "submit" value = "予定登録">';
echo '</form></td>';
echo '<td><form action = "login.html" method = "post">';
echo '<input type = "submit" value = "ログアウト">';
echo '</form></td>';
echo '</tr>';
echo '</table>';

//connect database, and get data
$pdo = new PDO("mysql:dbname=poppo","poppo","poppo.");

//print today's schedule
echo '<div style = "float: left;">'; //左寄りで描写
//題目（今日の予定）に点線を引いてみた　＋　題目までに左から2bitほどスペース確保
echo '<h1>&nbsp;&nbsp;<span class style = "border-bottom: dashed 2px #FF8C00;">今日の予定</span></h1>';
echo '<div class = "frame">';
//prepare in order to get data about today's schedule
$sql = 'SELECT hour, min, schedule FROM schedule WHERE date = current_date() AND id = ? ORDER BY hour;';
$st = $pdo -> prepare($sql);
$data = array($id);
$st -> execute($data);

//get data ,and print them 
echo '<table cellpadding = "5">';

while($row = $st -> fetch()){ //get data
$hour = htmlspecialchars($row['hour']);
$min = htmlspecialchars($row['min']);
$schedule = nl2br(htmlspecialchars($row['schedule']));

if(($hour <= 0) && ($hour < 10)){ //0時～9時は先頭に"0"をつけて表現する
echo '<tr><td valign = "top">0';}
else{
echo '<tr><td valign = "top">';}

echo $hour;

if(($min <= 0) && ($min < 10)){ //0分～9分は先頭に"0"をつけて表現する
echo ":0";}
else{
echo ":";}

echo $min."</td><td>".$schedule."</td></tr>";}

if($row == false){ //該当するレコードがなければ
echo "<tr><td> </td></tr>";}

echo '</table>';
echo '</div></div>';

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
