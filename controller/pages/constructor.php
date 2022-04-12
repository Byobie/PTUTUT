<?php 

	if(isset($_SESSION["accessConstructor"]) && $_SESSION["accessConstructor"] === true)
	{

		require("../include/init_twig.php");
		require("../../model/class/sqlQuery.class.php");

		//SQLQUERY IS AN EXTENDED CLASS, WHICH GENERATE A PDO AND ASSOCIATE SOME REQUEST.

		$dbQuery = new sqlQuery("99percents", "localhost", "utf8", 3308, "root", "");
		$table = $dbQuery->getDataWithoutCondition("site", "reference, value");

		if(isset($_GET["selectedTheme"]))
		{
			$selectedTheme = $_GET["selectedTheme"];
		}
		else
		{
			$selectedTheme = "dark";
		}

		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			$connexionStatut = true;
		}
		else
		{
			$connexionStatut = false;
		}

		if(isset($_SESSION["pagePosition"]))
		{
			$pagePosition = $_SESSION["pagePosition"];
		}
		else
		{
			$pagePosition = "FRESH";
		}

		if(isset($_SESSION["publishForm"]) && $_SESSION["publishForm"] === true)
		{
			$publishForm = $_SESSION["publishForm"];
		}
		else
		{
			$publishForm = false;
		}

		if(isset($_SESSION["registerError"]))
		{
			$registerError = $_SESSION["registerError"];
		}
		else
		{
			$registerError = "";
		}

		if(isset($_SESSION["connexionError"]))
		{
			$connexionError = $_SESSION["connexionError"];
		}
		else
		{
			$connexionError = "";
		}

		if(isset($_SESSION["publishTitle"]))
		{
			$publishTitle = $_SESSION["publishTitle"];
		}
		else
		{
			$publishTitle = "";
		}

		if(isset($_SESSION["publishContent"]))
		{
			$publishContent = $_SESSION["publishContent"];
		}
		else
		{
			$publishContent = "";
		}

		if(isset($_SESSION["publishError"]))
		{
			$publishError = $_SESSION["publishError"];
		}
		else
		{
			$publishError = "";
		}

		if(isset($_SESSION["imagePublishError"]))
		{
			$imagePublishError = $_SESSION["imagePublishError"];
		}
		else
		{
			$imagePublishError = "";
		}

		if(isset($_SESSION["imagePublishMessage"]))
		{
			$imagePublishMessage = $_SESSION["imagePublishMessage"];
		}
		else
		{
			$imagePublishMessage = "";
		}

		if(isset($_SESSION["imagePublishSuccess"]) && $_SESSION["imagePublishSuccess"] === true)
		{
			$imagePublishSuccess = $_SESSION["imagePublishSuccess"];
		}
		else
		{
			$imagePublishSuccess = false;
		}

		if(isset($_SESSION["publishStepThree"]) && $_SESSION["publishStepThree"] === true)
		{
			$publishSections = $dbQuery->getDataWithoutCondition("category", "id_category, name_category");
		}
		else
		{
			$publishSections = "";
		}

		if(isset($_SESSION["publishCategoryError"]))
		{
			$publishCategoryError = $_SESSION["publishCategoryError"];
		}
		else
		{
			$publishCategoryError = "";
		}

		if(isset($_SESSION["publishColor"]) && $_SESSION["publishColor"] === true)
		{
			$publishColor = true;
		}
		else
		{
			$publishColor = false;
		}

		if(isset($_SESSION["login"]) && isset($_SESSION["email"]))
		{
			$registerLogin = $_SESSION["login"];
			$registerEmail = $_SESSION["email"];
		}
		else
		{
			$registerLogin = "";
			$registerEmail = "";
		}
		if(isset($_SESSION["publishCategorySelected"]))
		{
			$publishCategorySelected = $_SESSION["publishCategorySelected"];
		}
		else
		{
			$publishCategorySelected = "";			
		}

		echo $twig->render($template, array('site' => $table, 'selectedTheme' => $selectedTheme, 'publishForm' => $publishForm, "connexionStatut" => $connexionStatut, "pagePosition" => $pagePosition, "registerError" => $registerError, "connexionError" => $connexionError, 'publishTitle' => $publishTitle, 'publishContent' => $publishContent, 'publishError' => $publishError, "imagePublishError" => $imagePublishError, "imagePublishSuccess" => $imagePublishSuccess, "imagePublishMessage" => $imagePublishMessage, 'publishSections' => $publishSections, 'publishCategoryError' => $publishCategoryError, 'publishColor' => $publishColor, 'registerLogin' => $registerLogin, 'registerEmail' => $registerEmail, 'publishCategorySelected' => $publishCategorySelected));
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
			header('Location: ../../index.php?selectedTheme=dark');
			exit;
		}
	}

?>