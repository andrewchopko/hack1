<?php
require_once "database.php";
Server::connectToServer();
Database::selectDatabase();

$enteredWords = $_POST["enteredWords"];

function isSimiliar($doctorName, $enteredWords){
	//echo $doctorName . "<br/>";
	//echo $enteredWords . "<br/>";
	$n = min( strlen($doctorName), strlen($enteredWords));
	for ($i = 0; $i < $n; $i++){
		if ($doctorName[$i] != $enteredWords[$i]){
			return false;
		}
	}
	return true;
}

function search($enteredWords){
	$strSQL = "select * from doctors";
	$rs = mysql_query($strSQL);
	while ($row = mysql_fetch_array($rs)){
		$name = $row["name"];
		if (isSimiliar($name, $enteredWords)){
			//echo $name . "<br/>";
			//echo $enteredWords . "<br/>";
			//echo $row["id"] . "<br/>"; 
			header("Location: http://localhost/project/cabinet.php?id_doctor=" . $row["id"]);
			return;
		}
	}

}
search($enteredWords);
echo "ok";
?>