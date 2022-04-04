<?php 

	session_start();

	//INCLUSION OF THE TWIG MOTOR AND THE TOOLS TO CONNECT TO THE DATABASE.

	require("../include/init_twig.php");
	require("../../model/class/sqlQuery.class.php");

	//SQLQUERY IS AN EXTENDED CLASS, WHICH GENERATE A PDO AND ASSOCIATE SOME REQUEST.

	$dbQuery = new sqlQuery("99percents", "localhost", "utf8", 3308, "root", "");
	$table = $dbQuery->getDataWithoutCondition("site", "reference, value");
	$connexion = 0;
	$publishPage = true;
	

	if(isset($_GET["theme"]))
	{
		$theme = $_GET["theme"];
	}
	else
	{
		$theme = "dark";
	}

	if(isset($_SESSION["publishError"]))
	{
		$registerError = $_SESSION["publishError"];
	}
	else
	{
		$registerError = "";
	}

	
	if(isset($_SESSION["connexion"]) && $_SESSION["connexion"] == true)
	{
		$connexion = 1;
	}
	else
	{
		$connexion = 0;
	}

	if(isset($_SESSION["newsTitle"]))
	{
		$title = $_SESSION["newsTitle"];
	}
	else
	{
		$title = "";
	}

	if(isset($_SESSION["newsContent"]))
	{
		$content = $_SESSION["newsContent"];
	}
	else
	{
		$content = "";
	}

	$position = $_SESSION["position"];

    echo $twig->render("publish.html.twig", array('site' => $table, 'theme' => $theme, "connexion" => $connexion, "registerError" => $registerError, "position" => $position, 'publishPage' => $publishPage, "title" => $title, "content" => $content));

?>