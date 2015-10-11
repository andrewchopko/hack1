<?php
require_once "database.php";
Server::connectToServer();
Database::selectDatabase();
$email = $_POST["email"];
$strSQL = "select password from doctors where email = '" . $email . "';";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);


$subject = "Поновлення паролю";
$text  = "Ваш пароль:";
$text .= $row["password"];
mail($email,$subject,$text);
echo $text;
?>