<?php
require_once "database.php";
Server::connectToServer();
Database::selectDatabase();

$phone = $_POST["phone"];
$strSQL = "delete from `order` where phone='" . $phone . "';";
echo $strSQL;
mysql_query($strSQL) or die(mysql_error());
echo "<p>OK</p>";
header("location: main.html");
?>