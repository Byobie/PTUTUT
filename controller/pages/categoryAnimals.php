<?php 

	session_start();

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		unset($_SESSION["access"]);

		$_SESSION["pagePosition"] = "ANIMALS";
		$_SESSION["pageDescription"] = "Ah yes, the animals. We know the animals very well here. We report about their weirdest secrets everyday.";
		$_SESSION["accessConstructor"] = true;

		$template = "category.html.twig";

		require("./constructor.php");

		$_SESSION["accessConstructor"] = false;
	}
	else
	{
		header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=15');
		exit;		
	}


	
?>