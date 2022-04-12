<?php 

	session_start();

	require("../class/makeDataBase.class.php");
	require("../class/news.class.php");
	require("../class/user.class.php");

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		$database = new makeDatabase("99percents", "localhost", "utf8", 3308, "root", "");
		$newsToUpload = new news($database->getDatabase());
		$newsUser = new user($database->getDatabase());

		$idUser = $newsUser->returnID($_SESSION["login"]);

		$newsToUpload->addTitleAndContent($_SESSION["publishTitle"], $_SESSION["publishContent"]);
		$newsToUpload->addImage($_SESSION["publishImageName"]);
		$newsToUpload->addCategory($_SESSION["publishCategorySelected"]);
		$newsToUpload->addSources($_SESSION["publishSource"]);		
		$newsToUpload->addUser($idUser);

		$newsToUpload->createNews();

		$_SESSION["access"] = false;
		unset($_SESSION["access"]);	

		header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=0');
		exit;
	}
	else
	{
		if(isset($_GET["selectedTheme"]))
		{
			header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=7');
			exit;
		}
		else
		{
			header('Location: ../../index.php?selectedTheme=dark&pageNumber=7');
			exit;
		}	
	}
?>