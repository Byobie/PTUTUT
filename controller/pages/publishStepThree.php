<?php 

	session_start();

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		unset($_SESSION["access"]);

		$_SESSION["accessConstructor"] = true;

		$_SESSION["publishColor"] = true;
		$_SESSION["pagePosition"] = "PUBLISH STEP 3/4";
		$_SESSION["pageDescription"] = "Choose a category !";

		$_SESSION["publishForm"] = true;
		$template = "publishStepThree.html.twig";

		require("./constructor.php");

		$_SESSION["accessConstructor"] = false;
		$_SESSION["publishColor"] = false;

	}
	else
	{
		if(isset($_GET["selectedTheme"]))
		{
			header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=6');
			exit;
		}
		else
		{
			header('Location: ../../index.php?selectedTheme=dark&pageNumber=6');
			exit;
		}
	}
		
?>