<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>メール送信</title>
</head>
<body>
<?php
#エラーからE_NOTICEを削除
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

#文字化け防止
mb_language("ja");
mb_internal_encoding("UTF-8");

#connect to database "poppo" ,and get data
$options = array(
PDO::MYSQL_ATTR_READ_DEFAULT_FILE => '/etc/my.cnf'); //charset
$pdo = new PDO("mysql:dbname=poppo","poppo","poppo.");
$st = $pdo -> query('SELECT date,hour,min,schedule from schedule where datediff(date, current_date()) >= 0 AND datediff(date, current_date()) < 10;'); //ten10 -> must2, AND id == ?
echo "<table><tr><td>date</td><td>hour:min</td><td>schedule</td></tr>";
$count = 0; //要素数
while($row = $st -> fetch()){ //get data
$date_t = htmlspecialchars($row['date']);
if($count == 0){ //if "date_t" is first data for "date" array
$date = array($date_t);}
else{
array_push($date, $date_t);} //add data to "date" array

$hour_t = htmlspecialchars($row['hour']);
if($count == 0){
$hour = array($hour_t);}
else{
array_push($hour, $hour_t);}

$min_t = htmlspecialchars($row['min']);
if($count == 0){
$min = array($min_t);}
else{
array_push($min, $min_t);}

$schedule_t = htmlspecialchars($row['schedule']);
if($count == 0){
$schedule = array($schedule_t);}
else{
array_push($schedule, $schedule_t);}

echo  "<tr><td>$date_t</td><td>$hour_t : $min_t</td><td>$schedule_t</td></tr>";
$count = $count + 1;}
echo "</table>";

#日時を秒に換算
//for($i = 0; $i < $count; $i++){
//list($yy, $mm, $dd) = explode('-', $date[$i]); //year, month, dayに分解
//$goal_t = mktime($hour[$i],$min[$i],0,$mm,$dd,$yy); //count seconds since 1970.1.1 00:00:00 GMT
//if($i == 0){
//$goal = array($goal_t);}
//else{
//array_push($goal, $goal_t);}}

#メール送ったかどうかの確認配列を初期化
//for($i = 0; $i < $count; $i++){
//if($i == 0){
//$mail_d = array(0);}
//else{
//array_push($mail_d, 0);}}

#time processing
//for($i = 0; $i < $count; $i++){
//$def = $goal[$i]-time();
//if($def > 0 && $def < 600 && $mail_d[$i] == 0){ //if within 10 minutes, and mail haven't been sent yet
//$address = "chi.213rainbow@gmail.com"; //must get from "user" database
//$kenmei = "schedule";
//$honbun = 
//$mailto = mb_send_mail()
//}
//}
?>
</body>
</html>
