<?php 

	session_start();

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		$_SESSION["access"] = false;
		
		$_SESSION["accessConstructor"] = true;

		$_SESSION["pagePosition"] = "FRESH";
		$_SESSION["pageDescription"] = "Welcome, boss ! Here's the latest news.";
		$template = "main_page.html.twig";

		require("./constructor.php");

		$_SESSION["accessConstructor"] = false;
	}
	else
	{
		header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=0');
		exit;
	}


	
?>