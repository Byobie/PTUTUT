<?php 

	session_start();

	require("../class/makeDataBase.class.php");
	require("../class/news.class.php");

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		$database = new makeDatabase("99percents", "localhost", "utf8", 3308, "root", "");

		$news = new news($database->getDatabase());
		$news->deleteNews($_SESSION["adminActionId_News"]);								

		$_SESSION["access"] = false;
		unset($_SESSION["access"]);

		header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=12');
		exit;
	}
	else
	{
		if(isset($_GET["selectedTheme"]))
		{
			header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=0');
			exit;
		}
		else
		{
			header('Location: ../../index.php?selectedTheme=dark&pageNumber=0');
			exit;
		}	
	}
?>


