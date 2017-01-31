<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ログイン確認画面</title>
</head>
<body>
<?php
$address = htmlspecialchars($_POST['address']);
$password = htmlspecialchars($_POST['password']);

echo $address;
echo $password;
$pdo = new PDO("mysql:dbname=poppo","poppo","poppo.");
//$pdo -> query('SET NAMES utf8');
$sql = 'SELECT name, id FROM user WHERE address = ? AND password = ?';
$st = $pdo -> prepare($sql);
echo $sql;
$data_t = array($address,$password);
$st -> execute($data_t);
foreach($data_t as $i){
echo $i;}

//$pdo = null; //close database

//while(
$row = $st -> fetch(PDO::FETCH_ASSOC);//get data
$name = htmlspecialchars($row['name']);
echo $name;//);
$id = $row['id'];
echo $id;

if($row == false){
echo "wrong password";
echo '<a href = "login.html">戻る</a>';}
else{
header('Location:top.php');}
//echo "ok";}
?>
</body>
</html>
