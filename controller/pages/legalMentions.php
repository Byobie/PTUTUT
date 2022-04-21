<?php 

	session_start();

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		$_SESSION["access"] = false;
		
		$_SESSION["accessConstructor"] = true;

		$_SESSION["pagePosition"] = "LEGAL MENTIONS";
		$_SESSION["pageDescription"] = "Welcome, boss ! Here's what you need to know about our business.";
		$template = "legalMentions.html.twig";

		require("./constructor.php");

		$_SESSION["accessConstructor"] = false;
	}
	else
	{
		header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=17');
		exit;
	}


	
?>