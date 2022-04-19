<?php 

	require("../../model/class/sqlQuery.class.php");		

	//SQLQUERY IS AN EXTENDED CLASS, WHICH GENERATE A PDO AND ASSOCIATE SOME REQUEST.

	$dbQuery = new sqlQuery("99percents", "localhost", "utf8", 3308, "root", "");

	$displayUsers = $dbQuery->getUsersList("users", "*");	

	print_r(json_encode($displayUsers));

?>