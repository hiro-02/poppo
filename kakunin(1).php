<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>会員登録確認画面</title>
</head>
<body>
<p>以下の内容でよろしいですか</p>
<?php
//error message function
function error_p($ep){
echo '<FONT color = "red">';
switch($ep){
case 1:
echo "名前が入力されていません。";
break;
case 2:
echo "メールアドレスが入力されていません。";
break;
case 3:
echo "パスワードが入力されていません。";
break;
case 4:
echo "パスワード（確認用）が入力されていません。";
break;
case 5:
echo "パスワードが一致していません。";
break;
default:
echo "予期せぬエラーが発生しました。";
break;}
echo '</FONT><br/>';}

//copy data from "touroku.html"
$name = htmlspecialchars($_POST["name"], ENT_QUOTES);
$address = htmlspecialchars($_POST["address"], ENT_QUOTES);
$password = htmlspecialchars($_POST["password"], ENT_QUOTES);
$password2 = htmlspecialchars($_POST["password2"], ENT_QUOTES);
$check = 0; //ok -> 0, having empty error -> -1

//print name and mail address, password
echo "<table>";
echo "<tr><th>氏名</th><td>".$name."</td></tr>";
echo "<tr><th>メールアドレス</th><td>".$address."</td></tr>";
echo "<tr><th>パスワード</th>";

//エラー変数初期化
$error_i = array(0,0,0,0,0);

//記入漏れエラー処理
if($name==''){
$error_i[0] = -1; //name empty error
$check = -1;}

if($address==''){
$error_i[1] = -1; //address empty error
$check = -1;}

if($password==''){
$error_i[2] = -1; //password empty error
$check = -1;}

if($password2==''){
$error_i[3] = -1; //password2 empty error
$check = -1;}

if($password != $password2){
$error_i[4] = -1; //パスワードの不一致エラー
$check = -1;}

//print password
if(($password!='') && ($password2!='') && ($password == $password2)){
$count_p = mb_strlen($password); //"password"の文字数をカウント
echo "<td>";
for($i = 0; $i < $count_p; $i++){ //expression by "*"
echo "*";}
echo "</td>";}
echo "</tr></table>";

//processing when condition is error
if($check == -1){ //remain before condition, and return
for($i = 0; $i < 5; $i++){
if($error_i[$i] != 0){
error_p(($i+1));}}
echo '<form>';
echo '<input type = "button" onclick = "history.back()" value = "戻る">';
echo '</form>';}

else{
session_start(); //give for other page
$_SESSION["name"] = $name;
$_SESSION["address"] = $address;
$_SESSION["password"] = $password;

//You can choose whether send or return
echo '<form action="k_ok.php" method="post" >';
echo '<input type="submit" value="送信">';
echo '</form>';
echo '<form>';
echo '<input type = "button" onclick = "history.back()" value = "戻る">';
echo '</form>';}
?>
<!--<form action="k_ok.php" method="post" >
<input type="submit" value="送信">
</form> -->
<!--<form>
<input type = "button" onclick = "history.back()" value = "戻る">
</form> -->
</body>
</html>
