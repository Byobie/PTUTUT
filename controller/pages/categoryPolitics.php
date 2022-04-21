<?php 

	session_start();

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		unset($_SESSION["access"]);

		$_SESSION["pagePosition"] = "POLITICS";
		$_SESSION["pageDescription"] = "Left, right, center, alt-right, alt-left, royalists, anarchists, etc... No worries, here, we hate you all !";
		$_SESSION["accessConstructor"] = true;

		$template = "category.html.twig";

		require("./constructor.php");

		$_SESSION["accessConstructor"] = false;
	}
	else
	{

		header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=14');
		exit;	
		
	}


	
?>