<?php
require_once 'database.php';
require_once 'order.php';
Server::connectToServer();
Database::selectDatabase();

//POST DATA
$name = $_POST["name"];
$phone = $_POST["phone"];
$day =  $_POST["day"];
$start =  $_POST["start"];
$newOrder = new Order($name,$phone,$day,$start);
//echo $_POST['id_doctor'];
$newOrder->addToDatabase($_POST['id_doctor']);
header( 'Location: http://localhost/project/cabinet.php?id_doctor=' . $_POST['id_doctor']);
?>