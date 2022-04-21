<?php 

	session_start();

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		$_SESSION["access"] = false;

		if(isset($_SESSION["typeUser"]) && $_SESSION["typeUser"] == "admin")
		{
			$_SESSION["adminColor"] = true;
			$_SESSION["accessConstructor"] = true;

			if(isset($_SESSION["adminPosition"]) && $_SESSION["adminPosition"] === 1)
			{
				$_SESSION["pagePosition"] = "ADMIN PANEL";
				$_SESSION["pageDescription"] = "You can decide here what you want to manage.";
				$template = "adminPanel.html.twig";
				unset($_SESSION["adminAction"]);
			}
			elseif(isset($_SESSION["adminPosition"]) && $_SESSION["adminPosition"] === 2)
			{
				if(isset($_SESSION["adminAction"]) && $_SESSION["adminAction"] === 1)
				{
					$_SESSION["pagePosition"] = "EDIT USER";
					$_SESSION["pageDescription"] = "You can edit an user here.";
					$template = "adminPanelEditUser.html.twig";
				}
				else
				{
					$_SESSION["pagePosition"] = "MANAGE USER";
					$_SESSION["pageDescription"] = "You choose an user to edit ou ... suppress.";
					$template = "adminPanelManageUsers.html.twig";
				}
			}
			elseif(isset($_SESSION["adminPosition"]) && $_SESSION["adminPosition"] === 3)
			{
				$_SESSION["pagePosition"] = "MANAGE CONTENT";
				$_SESSION["pageDescription"] = "You can decide here which content you want to suppress.";
				$template = "adminPanelManageTables.html.twig";
			}

			require("./constructor.php");

			$_SESSION["accessConstructor"] = false;
			$_SESSION["adminColor"] = false;
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
				header('Location: ../../index.php?selectedTheme=dark&pageNumber=0');
				exit;
			}
		}	
	}
	else
	{
		header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=8');
		exit;
	}

?>