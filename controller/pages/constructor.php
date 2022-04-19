<?php 

	if(isset($_SESSION["accessConstructor"]) && $_SESSION["accessConstructor"] === true)
	{

		require("../include/init_twig.php");
		require("../../model/class/sqlQuery.class.php");		

		//SQLQUERY IS AN EXTENDED CLASS, WHICH GENERATE A PDO AND ASSOCIATE SOME REQUEST.

		$dbQuery = new sqlQuery("99percents", "localhost", "utf8", 3308, "root", "");
		$table = $dbQuery->getDataWithoutCondition("site", "reference, value");
		$publishSections = $dbQuery->getDataWithoutCondition("category", "id_category, name_category");
		$browseCategory = $dbQuery->getDataWithoutCondition("category", "id_category, image_category");

		if($_SESSION["pagePosition"] == "FRESH")
		{
			$displayNews = $dbQuery->getAllNews("news", "*", 0, 3);			
		}
		else
		{
			$displayNews = $dbQuery->getNewsByCategory($_SESSION["pagePosition"], 0, 3);		
		}

		if(isset($_SESSION["adminPosition"]) && $_SESSION["adminPosition"] == 2)
		{
			$displayUsers = $dbQuery->getUsersList("user", "*");		
		}
		else
		{
			$displayUsers = "";
		}

		if(isset($_SESSION["adminPosition"]) && $_SESSION["adminPosition"] == 3)
		{
			$displayNewsAdmin = $dbQuery->getNewsList("news", "*");		
		}
		else
		{
			$displayNewsAdmin = "";
		}

		$usersArray = $dbQuery->getDataWithoutCondition("user", "id_user, login_user");
		ksort($usersArray);

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
			$publishTitle = html_entity_decode($_SESSION["publishTitle"]);
		}
		else
		{
			$publishTitle = "";
		}

		if(isset($_SESSION["publishContent"]))
		{
			$publishContent = html_entity_decode($_SESSION["publishContent"]);
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
		if(isset($_SESSION["publishSourceError"]))
		{
			$publishSourceError = $_SESSION["publishSourceError"];
		}
		else
		{
			$publishSourceError = "";			
		}
		if(isset($_SESSION["publishSource"]))
		{
			$publishSource = [];

			array_push($publishSource, html_entity_decode($_SESSION["publishSource"][0]));
			array_push($publishSource, html_entity_decode($_SESSION["publishSource"][1]));
			array_push($publishSource, html_entity_decode($_SESSION["publishSource"][2]));
			array_push($publishSource, html_entity_decode($_SESSION["publishSource"][3]));
			array_push($publishSource, html_entity_decode($_SESSION["publishSource"][4]));
			array_push($publishSource, html_entity_decode($_SESSION["publishSource"][5]));
		}
		else
		{
			$publishSource = "";			
		}

		if(isset($_SESSION["typeUser"]))
		{
			$typeUser = $_SESSION["typeUser"];
		}
		else
		{
			$typeUser = "";
		}
		if(isset($_SESSION["adminColor"]) && $_SESSION["adminColor"] === true)
		{
			$adminColor = true;
		}
		else
		{
			$adminColor = false;
		}

		if(isset($_SESSION["adminActionId_User"]))
		{
			$adminActionId_User = $_SESSION["adminActionId_User"];
		}
		else
		{
			$adminActionId_User = "";
		}

		echo $twig->render($template, array('site' => $table, 'selectedTheme' => $selectedTheme, 'publishForm' => $publishForm, "connexionStatut" => $connexionStatut, "pagePosition" => $pagePosition, "registerError" => $registerError, "connexionError" => $connexionError, 'publishTitle' => $publishTitle, 'publishContent' => $publishContent, 'publishError' => $publishError, "imagePublishError" => $imagePublishError, "imagePublishSuccess" => $imagePublishSuccess, "imagePublishMessage" => $imagePublishMessage, 'publishSections' => $publishSections, 'publishCategoryError' => $publishCategoryError, 'publishColor' => $publishColor, 'registerLogin' => $registerLogin, 'registerEmail' => $registerEmail, 'publishCategorySelected' => $publishCategorySelected, 'browseCategory' => $browseCategory, 'displayNews' => $displayNews, 'usersArray' => $usersArray, 'publishSourceError' => $publishSourceError, 'publishSource' => $publishSource, 'typeUser' => $typeUser, 'displayUsers' => $displayUsers, 'adminColor' => $adminColor, 'adminActionId_User' => $adminActionId_User, 'displayNewsAdmin' => $displayNewsAdmin));
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