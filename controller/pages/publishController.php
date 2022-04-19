<?php 

	session_start();

	require("../class/publishVerify.class.php");
	require("../class/imageVerify.class.php");
	require("../class/sourceVerify.class.php");
	require("../../model/class/makeDatabase.class.php");

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		$database = new makeDatabase("99percents", "localhost", "utf8", 3308, "root", "");

		if(isset($_SESSION["publishStepFour"]) && $_SESSION["publishStepFour"] === true) 
		{

			$sourceVerify = new sourceVerify($database->getDatabase());
			$sourceVerify->assignDatas($_SESSION["publishSource"][0], $_SESSION["publishSource"][1], $_SESSION["publishSource"][2], $_SESSION["publishSource"][3], $_SESSION["publishSource"][4], $_SESSION["publishSource"][5]);

			$result = $sourceVerify->checkSources();

			if($result === true)
			{
				$_SESSION["publishSource"] = $sourceVerify->returnDatas();
				header('Location: ../../model/script/createNew.php?selectedTheme='.$_GET["selectedTheme"]);
				exit;
			}
			else
			{
				$_SESSION["access"] = false;
				$_SESSION["publishSourceError"] = $result;
				header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=7');
				exit;
			}
		}
		elseif(isset($_SESSION["publishStepThree"]) && $_SESSION["publishStepThree"] === true) 
		{
			if($_SESSION["publishCategorySelected"] == "")
			{
				$_SESSION["publishCategoryError"] = "You must select a category.";
				$_SESSION["access"] = false;

				header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=6');
				exit;
			}
			else
			{
				$_SESSION["publishStepFour"] = true;
				$_SESSION["access"] = false;
				unset($_SESSION["publishCategoryError"]);
				header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=7');
				exit;
			}
		}
		elseif(isset($_SESSION["publishStepTwo"]) && $_SESSION["publishStepTwo"] === true)
		{
			if(isset($_SESSION["publishImageUploaded"]) && $_SESSION["publishImageUploaded"] === true)
			{
				unset($_SESSION["publishImageUploaded"]);
				$imageVerify = new imageVerify("../../model/Uploads/", "../../model/temporaryUploads/", $_SESSION["publishImageName"]);
				$result = $imageVerify->checkImage();

				if($result === true)
				{
					$_SESSION["imagePublishMessage"] = "Your image has been uploaded.";
					$_SESSION["imagePublishSuccess"] = true;
					$_SESSION["publishStepThree"] = true;
					
					header('Location: ../../model/script/createImage.php?selectedTheme='.$_GET["selectedTheme"]);
					exit;
				}
				else
				{
					$_SESSION["imagePublishError"] = $result;

					$_SESSION["access"] = false;
					unset($_SESSION["access"]);
					header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=5');
					exit;
				}
			}
			elseif (isset($_SESSION["publishImageSkip"]) && $_SESSION["publishImageSkip"] === true) 
			{
				unset($_SESSION["publishImageSkip"]);
				$_SESSION["publishStepThree"] = true;
				$_SESSION["publishImageName"] = "";
					
				header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=6');
				exit;
			}
		}
		else
		{
			//THE PURPOSE OF REGISTER CLASS IS TO VERIFY DATAS AND TO RETURN TRUE AS RESULT IF ALL IS GOOD OR AN ERROR MESSAGE IF IT IS NOT.
			$publishVerify = new publishVerify($database->getDatabase());
			$result = $publishVerify->checkStepOne($_SESSION["publishTitle"], $_SESSION["publishContent"]);

			if($result === true)
			{

				$_SESSION["publishTitle"] = htmlentities($_SESSION["publishTitle"]);
				$_SESSION["publishContent"] = htmlentities($_SESSION["publishContent"]);		
					
				unset($_SESSION["publishError"]);

				$_SESSION["publishStepTwo"] = true;

				$_SESSION["access"] = false;
				unset($_SESSION["access"]);	

				header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=5');
				exit;	
			}
			else
			{
				$_SESSION["publishError"] = $result;

				$_SESSION["access"] = false;
				unset($_SESSION["access"]);	

				header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=4');
				exit;	
			}
		}
	}
	else
	{
		$_SESSION["access"] = false;
		unset($_SESSION["access"]);

		if(isset($_GET["selectedTheme"]))
		{
			header('Location: ../../index.php?selectedTheme='.$_GET["selectedTheme"].'&pageNumber=4');
			exit;
		}
		else
		{
			header('Location: ../../index.php?selectedTheme=dark&pageNumber=4');
			exit;
		}							
	}
	
?>