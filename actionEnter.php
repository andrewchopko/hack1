<?php
require_once 'database.php';
require_once 'doctor.php';
Server::connectToServer();
Database::selectDatabase();

#POST DATA
$email = $_POST["email"];
$password = $_POST["password"]; 

$flagEnter = Doctor::isValidData($email, $password);
if ($flagEnter){
	$strSQL = "select id from doctors where email = '" . $email . "'";
	$rs = mysql_query($strSQL);
	$row = mysql_fetch_array($rs);
	//echo $row["id"] . "<br/>";
	header("Location: http://localhost/project/privateCabinet.php?id_doctor=" . $row["id"]);
}
else{
	echo "-";
	header("Location: http://localhost/project/enter.html");
}
?>