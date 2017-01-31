<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>予定登録完了画面</title>
<script language = "JavaScript"> //5秒後に"login.html"へ移動
mt = 5; //5秒後に移動
url = "top.php"; //移動先
function jumpPage(){
location.href = url;
}
setTimeout("jumpPage()",mt*1000);
</script>
</head>
<body>
<?php
session_start();
$schedule = $_SESSION["schedule"];
$date = $_SESSION["date"];
$hour = $_SESSION["hour"];
$min = $_SESSION["min"];
$id = $_SESSION["id_l"];

$pdo = new PDO("mysql:dbname=poppo","poppo","poppo.");
$st = $pdo -> prepare("INSERT INTO schedule (date, hour, min, schedule, id) VALUES(?,?,?,?,?)");
$st -> execute(array($date,$hour,$min,$schedule,$id));
$pdo = null;
?>
<p>会員登録が完了しました。</p>
</body>
</html>
