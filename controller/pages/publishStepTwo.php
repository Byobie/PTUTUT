<?php 

	session_start();

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		unset($_SESSION["access"]);

		$_SESSION["accessConstructor"] = true;

		$_SESSION["pagePosition"] = "PUBLISH STEP 2/3";
		$_SESSION["publishForm"] = true;
		$template = "publishStepTwo.html.twig";

		require("./constructor.php");

		$_SESSION["accessConstructor"] = false;

	}
	else
	{
		if(isset($_GET["selectedTheme"]))
		{
			header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=5');
			exit;
		}
		else
		{
			header('Location: ../../index.php?selectedTheme=dark&pageNumber=5');
			exit;
		}
	}
		
?>