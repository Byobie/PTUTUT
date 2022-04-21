<?php 

	session_start();

	require("../class/connexionVerify.class.php");
	require("../../model/class/makeDatabase.class.php");
	require("../../model/class/user.class.php");

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		$_SESSION["access"] = false;

		$database = new makeDatabase("99percents", "localhost", "utf8", 3308, "root", "");
		$connexionVerify = new connexionVerify($database->getDatabase());
		$result = $connexionVerify->checkConnexion($_SESSION["password"], $_SESSION["login"]);

		//THE RESULT MUST BE A BOOLEAN TRUE.
		if($result === true)
		{
			$user = new user($database->getDatabase());
			$checkType = $user->returnType($_SESSION["login"]);

			$_SESSION["typeUser"] = $checkType;

			if(isset($_SESSION["publishShortcut"]) && $_SESSION["publishShortcut"] === true)
			{
				$_SESSION["connexionStatut"] = true;
				unset($_SESSION["connexionError"]);					

				header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=4');
				exit;
			}
			else
			{
				//THE USER IS NOW CONNECTED. MESSAGE ERROR IS RESET. POSITION IS UPDATED AS THE USER IS REDIRECTES TO THE MAIN PAGE.
				$_SESSION["connexionStatut"] = true;
				unset($_SESSION["connexionError"]);

				header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=0');
				exit;
			}
		}
		else
		{
			//THE SESSION VARIABLE RETURN THE RIGHT ERROR MESSAGE. THE USER IS REDIRECTED TO THE REGISTER FORM.
			$_SESSION["connexionError"] = $result;

			header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=3');
			exit;
		}
	}
	else
	{
		header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=3');
		exit;		
	}
	
?>