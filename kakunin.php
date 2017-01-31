<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>会員登録確認画面</title>
</head>
<body>
<p>以下の内容でよろしいですか</p>
<table>
<tr>
<th>氏名</th>
<td><?php 
$name = $_POST["name"];
session_start();
$_SESSION["name"] = $name;
echo htmlspecialchars($name, ENT_QUOTES) ?></td>
</tr>
<tr>
<th>メールアドレス</th>
<td><?php
$address = $_POST["address"];
session_start();
$_SESSION["address"] = $address;
echo htmlspecialchars($address, ENT_QUOTES) ?></td>
</tr>
<tr>
<th>パスワード</th>
<td><?php
$password = $_POST["password"];
session_start();
$_SESSION["password"] = $password;
 echo htmlspecialchars($password, ENT_QUOTES) ?></td>
</tr>
</table>
<form action="k_ok.php" method="post" >
<input type="submit" value="送信">
</form>
</body>
</html>
