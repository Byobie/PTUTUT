<?php 

	session_start();

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		unset($_SESSION["access"]);
		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			if(isset($_GET["selectedTheme"]))
			{
				header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=3');
				exit;
			}
			else
			{
				header('Location: ../../index.php?selectedTheme=dark&pageNumber=3');
				exit;
			}
		}
		else
		{
			unset($_SESSION["access"]);

			$_SESSION["accessConstructor"] = true;

			$_SESSION["pagePosition"] = "LOG IN";
			$_SESSION["pageDescription"] = "Logged is great, but in, is better !";
			$template = "connexion.html.twig";

			require("./constructor.php");

			$_SESSION["accessConstructor"] = false;
		}
	}
	else
	{
		if(isset($_GET["selectedTheme"]))
		{
			header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=3');
			exit;
		}
		else
		{
			header('Location: ../../index.php?selectedTheme=dark&pageNumber=3');
			exit;
		}
		
	}


	
?>