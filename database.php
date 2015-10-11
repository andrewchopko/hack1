<?php
require_once 'config.php';
class Server{
	public static function connectToServer(){
		mysql_connect(DBhost,DBuser,DBpass);
	}
}

class Database{
	public static function createDatabase(){
		mysql_query("create database " . DBname);
	}
	public static function selectDatabase(){
		mysql_select_db(DBname);
	}
	public static function dropDatabase(){
		mysql_query("drop databse " . DBname);
	}
}
?>