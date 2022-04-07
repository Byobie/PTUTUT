<?php 

	session_start();

	if(isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 0)
	{
		if(isset($_SESSION["registerError"]))
		{
			unset($_SESSION["registerError"]);
		}

		if(isset($_SESSION["connexionError"]))
		{
			unset($_SESSION["connexionError"]);
		}

		if(isset($_SESSION["publishError"]))
		{
			unset($_SESSION["publishError"]);
		}

		if(isset($_SESSION["publishTitle"]))
		{
			unset($_SESSION["publishTitle"]);
		}

		if(isset($_SESSION["publishContent"]))
		{
			unset($_SESSION["publishContent"]);
		}

		if(isset($_SESSION["publishStepTwo"]))
		{
			unset($_SESSION["publishStepTwo"]);
		}

		$_SESSION["access"] = true;
		header('Location: ./controller/pages/mainPage.php?selectedTheme='.$_GET["selectedTheme"]);
		exit;	
	}
	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 1) 
	{

		if(isset($_SESSION["connexionError"]))
		{
			unset($_SESSION["connexionError"]);
		}

		if(isset($_SESSION["publishError"]))
		{
			unset($_SESSION["publishError"]);
		}

		if(isset($_SESSION["publishTitle"]))
		{
			unset($_SESSION["publishTitle"]);
		}

		if(isset($_SESSION["publishContent"]))
		{
			unset($_SESSION["publishContent"]);
		}

		if(isset($_SESSION["publishStepTwo"]))
		{
			unset($_SESSION["publishStepTwo"]);
		}

		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			header('Location: ./controller/pages/mainPage.php?selectedTheme='.$_GET["selectedTheme"]);
			exit;	
		}
		else
		{
			$_SESSION["access"] = true;

			if(isset($_POST["formSent"]) && $_POST["formSent"] == 1)
			{
				$_SESSION["login"] = $_POST["login"];
				$_SESSION["password"] = $_POST["password"];
				$_SESSION["confirmPassword"] = $_POST["confirmPassword"];
				$_SESSION["email"] = $_POST["email"];

				header('Location: ./controller/pages/registerController.php?selectedTheme='.$_GET["selectedTheme"]);
				exit;	
			}
			else
			{
				header('Location: ./controller/pages/register.php?selectedTheme='.$_GET["selectedTheme"]);
				exit;
			}	
		}
	}
	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 2) 
	{

		if(isset($_SESSION["registerError"]))
		{
			unset($_SESSION["registerError"]);
		}

		if(isset($_SESSION["connexionError"]))
		{
			unset($_SESSION["connexionError"]);
		}

		if(isset($_SESSION["publishError"]))
		{
			unset($_SESSION["publishError"]);
		}

		if(isset($_SESSION["publishTitle"]))
		{
			unset($_SESSION["publishTitle"]);
		}

		if(isset($_SESSION["publishContent"]))
		{
			unset($_SESSION["publishContent"]);
		}

		if(isset($_SESSION["publishStepTwo"]))
		{
			unset($_SESSION["publishStepTwo"]);
		}

		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			$_SESSION["connexionStatut"] = false;
			session_unset();
			session_destroy();
			header('Location: ./index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=0');
			exit;
		}
		else
		{
			header('Location: ./controller/pages/mainPage.php?selectedTheme=dark');
			exit;
		}
	}
	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 3) 
	{

		if(isset($_SESSION["registerError"]))
		{
			unset($_SESSION["registerError"]);
		}

		if(isset($_SESSION["publishError"]))
		{
			unset($_SESSION["publishError"]);
		}

		if(isset($_SESSION["publishTitle"]))
		{
			unset($_SESSION["publishTitle"]);
		}

		if(isset($_SESSION["publishContent"]))
		{
			unset($_SESSION["publishContent"]);
		}

		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			header('Location: ./index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=0');
			exit;
		}
		else
		{
			$_SESSION["access"] = true;

			if(isset($_POST["formSent"]) && $_POST["formSent"] == 2)
			{
				$_SESSION["login"] = $_POST["login"];
				$_SESSION["password"] = $_POST["password"];

				header('Location: ./controller/pages/connexionController.php?selectedTheme='.$_GET["selectedTheme"]);
				exit;	
			}
			else
			{
				header('Location: ./controller/pages/connexion.php?selectedTheme='.$_GET["selectedTheme"]);
				exit;
			}	
		}
	}
	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 4) 
	{

		if(isset($_SESSION["registerError"]))
		{
			unset($_SESSION["registerError"]);
		}

		if(isset($_SESSION["connexionError"]))
		{
			unset($_SESSION["connexionError"]);
		}

		if(isset($_SESSION["imagePublishError"]))
		{
			unset($_SESSION["imagePublishError"]);
		}

		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			$_SESSION["access"] = true;

			if(isset($_POST["formSent"]) && $_POST["formSent"] == 3)
			{

				$_SESSION["publishTitle"] = $_POST["title"];
				$_SESSION["publishContent"] = $_POST["content"];

				header('Location: ./controller/pages/publishController.php?selectedTheme='.$_GET["selectedTheme"]);
				exit;	
			}
			else
			{
				if(isset($_SESSION["publishStepTwo"]) && $_SESSION["publishStepTwo"] === true)
				{
					unset($_SESSION["publishStepTwo"]);
				}

				header('Location: ./controller/pages/publishStepOne.php?selectedTheme='.$_GET["selectedTheme"]);
				exit;
			}
		}
		else
		{
			$_SESSION["access"] = true;

			$_SESSION["publishShortcut"] = true;
			header('Location: ./controller/pages/connexion.php?selectedTheme='.$_GET["selectedTheme"]);
			exit;
		}
	}
	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 5) 
	{

		if(isset($_SESSION["registerError"]))
		{
			unset($_SESSION["registerError"]);
		}

		if(isset($_SESSION["connexionError"]))
		{
			unset($_SESSION["connexionError"]);
		}

		if(isset($_SESSION["publishError"]))
		{
			unset($_SESSION["publishError"]);
		}

		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			if(isset($_SESSION["publishStepTwo"]) && $_SESSION["publishStepTwo"] === true)
			{
				$_SESSION["access"] = true;

				if(isset($_POST["formSent"]) && $_POST["formSent"] == 4)
				{
					unset($_SESSION["imagePublishSuccess"]);

					if($_FILES["fileToUpload"]["error"] == 4)
					{
						print("EN CONSTRUCTION ! *BRRRRR* ");
						return;
					}
					else
					{
						$_SESSION["publishImageUploaded"] = true;
						move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "./model/temporaryUploads/".$_FILES["fileToUpload"]["name"]);
						$_SESSION["publishImageName"] = $_FILES["fileToUpload"]["name"];
						header('Location: ./controller/pages/publishController.php?selectedTheme='.$_GET["selectedTheme"]);
						exit;
					}
				}
				else
				{
					header('Location: ./controller/pages/publishStepTwo.php?selectedTheme='.$_GET["selectedTheme"]);
					exit;
				}
			}
			else
			{
				$_SESSION["access"] = true;

				header('Location: ./controller/pages/publishStepOne.php?selectedTheme='.$_GET["selectedTheme"]);
				exit;
			}

		}
		else
		{
			$_SESSION["access"] = true;

			$_SESSION["publishShortcut"] = true;
			header('Location: ./controller/pages/connexion.php?selectedTheme='.$_GET["selectedTheme"]);
			exit;
		}
	}



	else
	{
		if(isset($_SESSION["registerError"]))
		{
			unset($_SESSION["registerError"]);
		}

		if(isset($_SESSION["connexionError"]))
		{
			unset($_SESSION["connexionError"]);
		}

		if(isset($_SESSION["publishError"]))
		{
			unset($_SESSION["publishError"]);
		}

		if(isset($_SESSION["publishTitle"]))
		{
			unset($_SESSION["publishTitle"]);
		}

		if(isset($_SESSION["publishContent"]))
		{
			unset($_SESSION["publishContent"]);
		}

		if(isset($_SESSION["publishStepTwo"]))
		{
			unset($_SESSION["publishStepTwo"]);
		}

		$_SESSION["access"] = true;
		header('Location: ./controller/pages/mainPage.php?selectedTheme=dark');
		exit;		
	}	


?>