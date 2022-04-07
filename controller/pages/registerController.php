<?php 

	session_start();

	require("../class/registerVerify.class.php");
	require("../../model/class/makeDatabase.class.php");

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		//THE PURPOSE OF REGISTER CLASS IS TO VERIFY DATAS AND TO RETURN TRUE AS RESULT IF ALL IS GOOD OR AN ERROR MESSAGE IF IT IS NOT.
		$database = new makeDatabase("99percents", "localhost", "utf8", 3308, "root", "");
		$registerVerify = new registerVerify($database->getDatabase());
		$result = $registerVerify->checkRegister($_SESSION["login"], $_SESSION["password"], $_SESSION["confirmPassword"], $_SESSION["email"]);

		//THE RESULT MUST BE A BOOLEAN TRUE.

		if($result === true)
		{
			$_SESSION["connexionStatut"] = true;
			unset($_SESSION["registerError"]);
			
			header('Location: ../../model/script/createUser.php?selectedTheme='.$_GET["selectedTheme"]);
			exit;
		}
		else
		{
			//THE SESSION VARIABLE RETURN THE RIGHT ERROR MESSAGE. THE USER IS REDIRECTED TO THE REGISTER FORM.
			$_SESSION["registerError"] = $result;

			$_SESSION["access"] = false;
			unset($_SESSION["access"]);
			header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=1');
			exit;
		}
	}
	else
	{
		$_SESSION["access"] = false;
		unset($_SESSION["access"]);

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