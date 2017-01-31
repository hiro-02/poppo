<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ログイン確認画面</title>
</head>
<body>
<?php
$address = htmlspecialchars($_POST['address']);
$password = htmlspecialchars($_POST['password']);

$pdo = new PDO("mysql:dbname=poppo","poppo","poppo.");
$sql = 'SELECT name, id FROM user WHERE address = ? AND password = ?';
$st = $pdo -> prepare($sql);
$data_t = array($address,$password);
$st -> execute($data_t);

$row = $st -> fetch(PDO::FETCH_ASSOC);//get data
$name = htmlspecialchars($row['name']);
$id = $row['id'];
$pdo = null; //cut connect to database

if($row == false){ //該当するレコードがなければ
echo '<FONT color = "red">メールアドレスまたはパスワードが正しくありません。</FONT><br/>';
echo '<form><input type = "button" onclick = "history.back()" value = "戻る"></form>';}

else{
session_start(); //give for other page
$_SESSION["name_l"] = $name;
$_SESSION["id_l"] = $id;
header('Location:top.php');} //"top.php"へ
?>
</body>
</html>
