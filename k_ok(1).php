<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>会員登録完了画面</title>
</head>
<body>
<?php
session_start();
$name = $_SESSION["name"];
$address = $_SESSION["address"];
$password = $_SESSION["password"];
$pdo = new PDO("mysql:dbname=poppo","poppo","poppo.");
$st = $pdo -> prepare("INSERT INTO user (name, address, password) VALUES(?,?,?)");
$st -> execute(array($name,$address,$password));
?>
<p>会員登録が完了しました。</p>
</body>
</html>
