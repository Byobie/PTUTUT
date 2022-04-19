<?php 

	session_start();

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		if(isset($_SESSION["typeUser"]) && $_SESSION["typeUser"] == "admin")
		{
			$_SESSION["adminColor"] = true;
			$_SESSION["accessConstructor"] = true;

			if(isset($_SESSION["adminPosition"]) && $_SESSION["adminPosition"] === 1)
			{
				$_SESSION["pagePosition"] = "ADMIN PANEL";
				$template = "adminPanel.html.twig";
				unset($_SESSION["adminAction"]);
			}
			elseif(isset($_SESSION["adminPosition"]) && $_SESSION["adminPosition"] === 2)
			{
				if(isset($_SESSION["adminAction"]) && $_SESSION["adminAction"] === 1)
				{
					$_SESSION["pagePosition"] = "EDIT USER";
					$template = "adminPanelEditUser.html.twig";
				}
				else
				{
					$_SESSION["pagePosition"] = "MANAGE USER";
					$template = "adminPanelManageUsers.html.twig";
				}
			}
			elseif(isset($_SESSION["adminPosition"]) && $_SESSION["adminPosition"] === 3)
			{
				$_SESSION["pagePosition"] = "MANAGE CONTENT";
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


	
?>