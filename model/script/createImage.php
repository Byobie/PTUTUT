<?php 

	session_start();

	require("../class/makeDataBase.class.php");
	require("../class/uploadImage.class.php");

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		$database = new makeDatabase("99percents", "localhost", "utf8", 3308, "root", "");

		$image = new uploadImage($database->getDatabase(), $_SESSION["publishImageName"], "../temporaryUploads/", "../uploads/");
		$image->moveFile();

		$_SESSION["access"] = false;
		unset($_SESSION["access"]);

		header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=6');
		exit;
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