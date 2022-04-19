<?php 

	session_start();

	require("../class/makeDataBase.class.php");
	require("../class/user.class.php");

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		$database = new makeDatabase("99percents", "localhost", "utf8", 3308, "root", "");

		$user = new user($database->getDatabase());
		$user->createUser($_SESSION["password"], $_SESSION["login"], $_SESSION["email"]);								

		$_SESSION["access"] = false;
		unset($_SESSION["access"]);

		if(isset($_SESSION["publishShortcut"]) && $_SESSION["publishShortcut"] === true)
		{		
			unset($_SESSION["publishShortcut"]);
			
			header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=4');
			exit;
		}

		header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=0');
		exit;
	}
	else
	{
		if(isset($_GET["selectedTheme"]))
		{
			header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=1');
			exit;
		}
		else
		{
			header('Location: ../../index.php?selectedTheme=dark&pageNumber=1');
			exit;
		}	
	}
?>