<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>入力確認画面</title>
</head>
<body>
<p>以下の内容でよろしいですか。</p>
<?php
//error message function
function error_p($ep){
echo '<FONT color = "red">';
switch($ep){
case 1:
echo "予定が入力されていません。";
break;
case 2:
echo "日付が入力されていません。";
break;
default:
echo "予期せぬエラーが発生しました。";
break;}
echo '</FONT><br/>';}

//copy data from "nyuryoku.html"
$schedule = htmlspecialchars($_POST["schedule"], ENT_QUOTES);
$date = $_POST["date"];
$hour = htmlspecialchars($_POST["hour"], ENT_QUOTES);
$min = htmlspecialchars($_POST["min"], ENT_QUOTES);
$check = 0; //ok -> 0, having error -> -1

//エラー変数初期化
$error_i = array(0,0);

//記入漏れエラー処理
if($schedule==''){
$error_i[0] = -1; //schedule empty error
$check = -1;}

if($date==''){
$error_i[1] = -1; //date empty error
$check = -1;
$date_r = '';}
else{
$date_r = date("Y-m-d",strtotime($date)); //yyyy/mm/dd -> yyyy-mm-dd
$date_r = htmlspecialchars($date_r, ENT_QUOTES);}

if($hour==''){ //hour not decide error
$hour = 0;}

if($min==''){ //min not decide error
$min = 0;}

//print date and time, schedule
echo '<table border="1">';
echo "<tr><td>日付</td><td>";
echo $date_r."　";
echo $hour." 時 ";
echo $min." 分</td></tr>";
echo "<tr><td>予定</td><td>";
echo nl2br($schedule)."</td></tr></table>";

//processing when condition is error
if($check == -1){ //remain before condition, and return
for($i = 0; $i < 2; $i++){
if($error_i[$i] != 0){
error_p(($i+1));}}
echo '<form>';
echo '<input type = "button" onclick = "history.back()" value = "戻る">';
echo '</form>';}

else{
session_start(); //give for other page
$_SESSION["schedule"] = $schedule;
$_SESSION["date"] = $date_r;
$_SESSION["hour"] = $hour;
$_SESSION["min"] = $min;

//You can choose whether send or return
echo '<form action="f_input.php" method="post" >';
echo '<input type="submit" value="送信">';
echo '</form>';
echo '<form>';
echo '<input type = "button" onclick = "history.back()" value = "戻る">';
echo '</form>';} 
?>
</body>
</html>
