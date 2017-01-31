<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>入力確認画面</title>
</head>
<body>
<p>以下の内容を入力しました。</p>
<table border="1">
<tr>
<td>予定</td><td><?php echo htmlspecialchars($_POST["schedule"], ENT_QUOTES) ?></td>
</tr>
<tr>
<td>日付</td><td><?php echo htmlspecialchars($_POST["date"], ENT_QUOTES) ?></td>
</tr>
</table>
</body>
</html>
