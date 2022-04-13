<?php 

	session_start();

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		unset($_SESSION["access"]);

		$_SESSION["accessConstructor"] = true;

		$_SESSION["pagePosition"] = "FRESH";
		$template = "main_page.html.twig";

		require("./constructor.php");

		$_SESSION["accessConstructor"] = false;
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