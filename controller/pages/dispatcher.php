<?php 

	session_start();

	require("./controller/pages/cleaner.php");

	if(isset($_GET["selectedTheme"]) && ($_GET["selectedTheme"] == "dark" || $_GET["selectedTheme"] == "bright"))
	{
		$selectedTheme = $_GET["selectedTheme"];
	}
	else
	{
		$selectedTheme = "dark";
	}	

	if(isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 0)
	{
		$_SESSION["access"] = true;
		header('Location: ./controller/pages/mainPage.php?selectedTheme='.$selectedTheme);
		exit;	
	}
	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 1) 
	{	
		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=0');
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

				header('Location: ./controller/pages/registerController.php?selectedTheme='.$selectedTheme);
				exit;	
			}
			else
			{
				header('Location: ./controller/pages/register.php?selectedTheme='.$selectedTheme);
				exit;
			}	
		}
	}
	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 2) 
	{
		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			$_SESSION["connexionStatut"] = false;
			session_unset();
			session_destroy();
			header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=0');
			exit;
		}
		else
		{
			header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=0');
			exit;
		}
	}
	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 3) 
	{
		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=0');
			exit;
		}
		else
		{
			$_SESSION["access"] = true;

			if(isset($_POST["formSent"]) && $_POST["formSent"] == 2)
			{
				$_SESSION["login"] = $_POST["login"];
				$_SESSION["password"] = $_POST["password"];

				header('Location: ./controller/pages/connexionController.php?selectedTheme='.$selectedTheme);
				exit;	
			}
			else
			{
				header('Location: ./controller/pages/connexion.php?selectedTheme='.$selectedTheme);
				exit;
			}	
		}
	}
	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 4) 
	{

		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			unset($_SESSION["publishShortcut"]);
			
			$_SESSION["access"] = true;

			if(isset($_POST["formSent"]) && $_POST["formSent"] == 3)
			{

				$_SESSION["publishTitle"] = $_POST["title"];
				$_SESSION["publishContent"] = $_POST["content"];

				header('Location: ./controller/pages/publishController.php?selectedTheme='.$selectedTheme);
				exit;	
			}
			else
			{
				if(isset($_SESSION["publishStepTwo"]) && $_SESSION["publishStepTwo"] === true)
				{
					unset($_SESSION["publishStepTwo"]);
				}

				header('Location: ./controller/pages/publishStepOne.php?selectedTheme='.$selectedTheme);
				exit;
			}
		}
		else
		{
			$_SESSION["publishShortcut"] = true;
			$_SESSION["connexionError"] = "You must log in first !";
			
			header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=3');
			exit;
		}
	}
	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 5) 
	{

		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			if(isset($_SESSION["publishStepTwo"]) && $_SESSION["publishStepTwo"] === true)
			{
				if(isset($_SESSION["publishStepThree"]) && $_SESSION["publishStepThree"] === true)
				{
					unset($_SESSION["publishStepThree"]);
				}	

				if(isset($_SESSION["publishStepFour"]) && $_SESSION["publishStepFour"] === true)
				{
					unset($_SESSION["publishStepFour"]);
				}

				$_SESSION["access"] = true;

				if(isset($_POST["formSent"]) && $_POST["formSent"] == 4)
				{
					unset($_SESSION["imagePublishSuccess"]);

					if($_FILES["fileToUpload"]["error"] == 4)
					{
						$_SESSION["publishImageSkip"] = true;
						header('Location: ./controller/pages/publishController.php?selectedTheme='.$selectedTheme);
						exit;
					}
					else
					{
						$_SESSION["publishImageUploaded"] = true;
						move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "./model/temporaryUploads/".$_FILES["fileToUpload"]["name"]);
						$_SESSION["publishImageName"] = $_FILES["fileToUpload"]["name"];
						header('Location: ./controller/pages/publishController.php?selectedTheme='.$selectedTheme);
						exit;
					}
				}
				else
				{
					header('Location: ./controller/pages/publishStepTwo.php?selectedTheme='.$selectedTheme);
					exit;
				}
			}
			else
			{
				header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=4');
				exit;
			}

		}
		else
		{
			$_SESSION["publishShortcut"] = true;
			$_SESSION["connexionError"] = "You must log in first !";

			header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=3');
			exit;
		}
	}

	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 6) 
	{
		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			if(isset($_SESSION["publishStepThree"]) && $_SESSION["publishStepThree"] === true)
			{
				if(isset($_SESSION["publishStepFour"]) && $_SESSION["publishStepFour"] === true)
				{
					unset($_SESSION["publishStepFour"]);
				}

				$_SESSION["access"] = true;

				if(isset($_POST["formSent"]) && $_POST["formSent"] == 5)
				{
					$_SESSION["publishCategorySelected"] = $_POST["categoryPublish"];

					header('Location: ./controller/pages/publishController.php?selectedTheme='.$selectedTheme);
					exit;
				}
				else
				{
					header('Location: ./controller/pages/publishStepThree.php?selectedTheme='.$selectedTheme);
					exit;
				}
			}
			else
			{
				header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=5');
				exit;
			}

		}
		else
		{
			$_SESSION["publishShortcut"] = true;
			$_SESSION["connexionError"] = "You must log in first !";

			header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=3');
			exit;
		}
	}

	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 7) 
	{
		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			if(isset($_SESSION["publishStepFour"]) && $_SESSION["publishStepFour"] === true)
			{
				$_SESSION["access"] = true;

				if(isset($_POST["formSent"]) && $_POST["formSent"] == 6)
				{

					$_SESSION["publishSource"] = [];
					array_push($_SESSION["publishSource"], htmlentities(trim($_POST["sourceTitleOne"])));
					array_push($_SESSION["publishSource"], trim($_POST["sourceUrlOne"]));
					array_push($_SESSION["publishSource"], htmlentities(trim($_POST["sourceTitleTwo"])));
					array_push($_SESSION["publishSource"], trim($_POST["sourceUrlTwo"]));
					array_push($_SESSION["publishSource"], htmlentities(trim($_POST["sourceTitleThree"])));
					array_push($_SESSION["publishSource"], trim($_POST["sourceUrlThree"]));

					header('Location: ./controller/pages/publishController.php?selectedTheme='.$selectedTheme);
					exit;
				}
				else
				{
					header('Location: ./controller/pages/publishStepFour.php?selectedTheme='.$selectedTheme);
					exit;
				}
			}
			else
			{
				header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=6');
				exit;
			}

		}
		else
		{
			$_SESSION["publishShortcut"] = true;
			$_SESSION["connexionError"] = "You must log in first !";

			header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=3');
			exit;
		}
	}

	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 8) 
	{
		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			if(isset($_SESSION["typeUser"]) && $_SESSION["typeUser"] == "admin")
			{
				$_SESSION["access"] = true;
				$_SESSION["adminPosition"] = 1;

				header('Location: ./controller/pages/adminPanel.php?selectedTheme='.$selectedTheme);
				exit;

			}
			else
			{
				header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=0');
				exit;
			}

		}
		else
		{
			$_SESSION["connexionError"] = "You must be logged first.";

			header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=3');
			exit;
		}
	}

	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 9) 
	{
		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			if(isset($_SESSION["typeUser"]) && $_SESSION["typeUser"] == "admin")
			{
				$_SESSION["access"] = true;
				$_SESSION["adminPosition"] = 2;
				unset($_SESSION["adminAction"]);

				header('Location: ./controller/pages/adminPanel.php?selectedTheme='.$selectedTheme);
				exit;

			}
			else
			{
				header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=0');
				exit;
			}

		}
		else
		{
			$_SESSION["connexionError"] = "You must be logged first.";

			header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=3');
			exit;
		}
	}

	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 10) 
	{
		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			if(isset($_SESSION["typeUser"]) && $_SESSION["typeUser"] == "admin")
			{
				$_SESSION["access"] = true;
				$_SESSION["adminPosition"] = 2;
				$_SESSION["adminAction"] = 1;

				if(isset($_GET["id_user"]))
				{
					$_SESSION["adminActionId_User"] = $_GET["id_user"];
				}

				if(isset($_POST["formSent"]) && $_POST["formSent"] == 7)
				{
					$_SESSION["emailAdmin"] = $_POST["emailAdmin"];
					$_SESSION["loginAdmin"] = $_POST["loginAdmin"];
					$_SESSION["typeAdmin"] = $_POST["typeAdmin"];

					header('Location: ./model/script/updateUser.php?selectedTheme='.$selectedTheme);
					exit;
				}
				else
				{
					header('Location: ./controller/pages/adminPanel.php?selectedTheme='.$selectedTheme);
					exit;
				}

			}
			else
			{
				header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=0');
				exit;
			}
		}
		else
		{
			$_SESSION["connexionError"] = "You must be logged first.";

			header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=3');
			exit;
		}
	}

	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 11) 
	{
		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			if(isset($_SESSION["typeUser"]) && $_SESSION["typeUser"] == "admin")
			{
				$_SESSION["access"] = true;

				if(isset($_GET["id_user"]))
				{
					$_SESSION["adminActionId_User"] = $_GET["id_user"];
				}
				
				header('Location: ./model/script/deleteUser.php?selectedTheme='.$selectedTheme);
				exit;
			}
			else
			{
				header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=0');
				exit;
			}
		}
		else
		{
			$_SESSION["connexionError"] = "You must be logged first.";

			header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=3');
			exit;
		}
	}

	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 12) 
	{
		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			if(isset($_SESSION["typeUser"]) && $_SESSION["typeUser"] == "admin")
			{
				$_SESSION["access"] = true;
				$_SESSION["adminPosition"] = 3;
				unset($_SESSION["adminAction"]);

				header('Location: ./controller/pages/adminPanel.php?selectedTheme='.$selectedTheme);
				exit;

			}
			else
			{
				header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=0');
				exit;
			}

		}
		else
		{
			$_SESSION["connexionError"] = "You must be logged first.";

			header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=3');
			exit;
		}
	}

	elseif (isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 13) 
	{
		if(isset($_SESSION["connexionStatut"]) && $_SESSION["connexionStatut"] === true)
		{
			if(isset($_SESSION["typeUser"]) && $_SESSION["typeUser"] == "admin")
			{
				$_SESSION["access"] = true;

				if(isset($_GET["id_news"]))
				{
					$_SESSION["adminActionId_News"] = $_GET["id_news"];
				}

				header('Location: ./model/script/deleteNews.php?selectedTheme='.$selectedTheme);
				exit;
			}
			else
			{
				header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=0');
				exit;
			}
		}
		else
		{
			$_SESSION["connexionError"] = "You must be logged first.";

			header('Location: ./index.php?selectedTheme='.$selectedTheme.'&pageNumber=3');
			exit;
		}
	}

	elseif (isset($_GET["pageNumber"]) && ($_GET["pageNumber"] > 13) && ($_GET["pageNumber"] < 17))
	{
		switch ($_GET["pageNumber"]) 
		{
			case 14 :
				
				$_SESSION["access"] = true;
				

				header('Location: ./controller/pages/categoryPolitics.php?selectedTheme='.$selectedTheme);
				exit;	

				break;

			case 15 :

				$_SESSION["access"] = true;

				header('Location: ./controller/pages/categoryAnimals.php?selectedTheme='.$selectedTheme);
				exit;

				break;

			case 16 :

				$_SESSION["access"] = true;

				header('Location: ./controller/pages/categorySatirical.php?selectedTheme='.$selectedTheme);
				exit;

				break;

			default:

				header('Location: ./controller/pages/mainPage.php?selectedTheme='.$selectedTheme);
				exit;
				// code...
				break;
		}
	}

	elseif(isset($_GET["pageNumber"]) && $_GET["pageNumber"] == 17)
	{
		$_SESSION["access"] = true;
		header('Location: ./controller/pages/legalMentions.php?selectedTheme='.$selectedTheme);
		exit;	
	}

	else
	{
		header('Location: ./index.php?selectedTheme=dark&pageNumber=0');
		exit;		
	}	


?>