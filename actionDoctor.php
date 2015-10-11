<?php
require_once 'doctor.php';
require_once 'database.php';
Server::connectToServer();
Database::selectDatabase();

//POST DATA
$email = $_POST["email"];
$password = $_POST["password"];
$name = $_POST["name"];
$type = $_POST["type"];
if (isset($_POST["monday"])){
	$monday = true;
}
else{
	$monday = false;
}
if (isset($_POST["tuesday"])){
	$tuesday = true;
}
else{
	$tuesday = false;
}
if (isset($_POST["wednesday"])){
	$wednesday = true;
}
else{
	$wednesday = false;
}
if (isset($_POST["thursday"])){
	$thursday = true;
}
else{
	$thursday = false;
}
if (isset($_POST["friday"])){
	$friday = true;
}
else{
	$friday = false;
}
$duration = $_POST["duration"];
$start = $_POST["start"];
$finish = $_POST["finish"];
$cabinet = $_POST["cabinet"];
$hospital_id = $_POST["hospital_id"];

$newDoctor = new Doctor($email, $password, $name, $type, $monday, $tuesday, $wednesday, 
						$thursday, $friday, $start, $finish, $duration, $cabinet, $hospital_id);
$newDoctor->addToDatabase();
$strSQL = "select id from doctors where email = '" . $email . "'";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);
//echo $row["id"] . "<br/>";
header("Location: http://localhost/project/privateCabinet.php?id_doctor=" . $row["id"]);
echo "<h1>OK<h1>";
?>