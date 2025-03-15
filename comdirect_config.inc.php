<?php

	//ABDL-COMDIRECT V1.5
	//16.09.2024
	//CONFIGURATION FILE
	
	$appSecurityToken = "1234";
	$appTitle = "comdirect";
	$appDate = date("d.m.Y", time());
	$appScriptDate = date("d.m.Y", time() + 86400);
	
	date_default_timezone_set("Europe/Berlin");
	$appTimestamp = time();

	$SQL_host = "localhost";
	$SQL_username = "";
	$SQL_password = "";
	$SQL_database = "";

	$SQL = new MySQLi($SQL_host, $SQL_username, $SQL_password, $SQL_database);

	if(mysqli_connect_errno() != 0 || !$SQL->set_charset('utf8')) {
		die('SQL-Verbindung nicht möglich! Daten überprüfen!');
	}

?>