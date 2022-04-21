<?php 

	session_start();

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		unset($_SESSION["access"]);

		$_SESSION["pagePosition"] = "SATIRICAL";
		$_SESSION["pageDescription"] = "Because why so serious ?";
		$_SESSION["accessConstructor"] = true;

		$template = "category.html.twig";

		require("./constructor.php");

		$_SESSION["accessConstructor"] = false;
	}
	else
	{
		header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=16');
		exit;	
	}


	
?>