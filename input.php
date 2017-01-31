<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>入力確認画面</title>
</head>
<body>
<p>以下の内容を入力しました。</p>
<table border="1">
<tr>
<td>日付</td><td><?php
$schedule = $_POST["schedule"];
$date = $_POST["date"];
$hour = $_POST["hour"];
$min = $_POST["min"];
$id = 1; //tentative
echo htmlspecialchars($date,ENT_QUOTES);
echo " ";
echo htmlspecialchars($hour,ENT_QUOTES);
echo " 時 ";
echo htmlspecialchars($min,ENT_QUOTES);
echo " 分 ";
$pdo = new PDO("mysql:dbname=poppo","poppo","poppo."); //username=poppo, password=poppo.
$st = $pdo -> prepare("INSERT INTO schedule (date, hour, min, schedule, id) VALUES(?,?,?,?,?)");
$st -> execute(array($date,$hour,$min,$schedule,$id)) ?></td>
</tr>
<tr>
<td>予定</td><td><?php
$schedule = $_POST["schedule"];
echo nl2br(htmlspecialchars($schedule, ENT_QUOTES)) ?></td>
</tr>
</table>
</body>
</html>
