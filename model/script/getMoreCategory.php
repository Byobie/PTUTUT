<?php 

	require("../../model/class/sqlQuery.class.php");		

	//SQLQUERY IS AN EXTENDED CLASS, WHICH GENERATE A PDO AND ASSOCIATE SOME REQUEST.

	$dbQuery = new sqlQuery("99percents", "localhost", "utf8", 3308, "root", "");

	$displayCategory = $dbQuery->getCategoryList("category", "*");	

	print_r(json_encode($displayCategory));

?>