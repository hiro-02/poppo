<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>会員登録完了画面</title>
<script language = "JavaScript"> //5秒後に"login.html"へ移動
mt = 5; //5秒後に移動
url = "login.html"; //移動先
function jumpPage(){
location.href = url;
}
setTimeout("jumpPage()",mt*1000);
</script>
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
$pdo = null;
?>
<p>会員登録が完了しました。</p>
</body>
</html>
