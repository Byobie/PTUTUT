<?php 

	session_start();

	require("../class/publishVerify.class.php");
	require("../class/imageVerify.class.php");
	require("../../model/class/makeDatabase.class.php");

	if(isset($_SESSION["access"]) && $_SESSION["access"] === true)
	{
		$database = new makeDatabase("99percents", "localhost", "utf8", 3308, "root", "");
		
		if(isset($_SESSION["publishImageUploaded"]) && $_SESSION["publishImageUploaded"] === true)
		{
			unset($_SESSION["publishImageUploaded"]);
			$imageVerify = new imageVerify("../../model/Uploads/", "../../model/temporaryUploads/", $_SESSION["publishImageName"]);
			$result = $imageVerify->checkImage();

			if($result === true)
			{
				$_SESSION["imagePublishMessage"] = "Your image has been uploaded.";
				$_SESSION["imagePublishSuccess"] = true;
				
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

			/*$image = file_get_contents("../../model/temporaryUploads/".$_SESSION["imageName"]);
			var_dump($image);*/

			var_dump($result);

			/*

						if($image === true && !isset($_SESSION["imageUploadSuccess"]))
						{
							$test = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "./model/uploads/".$_FILES["fileToUpload"]["name"]);
							$_SESSION["imageUploadSuccess"] = true;
							$_SESSION["validationImage"] = "Your image has been uploaded.";
							$_SESSION["name"] = $_FILES["fileToUpload"]["name"];
							header('Location: ./controller/pages/publishStepTwo.php?theme='.$theme);
							exit;
						}
						elseif (isset($_SESSION["imageUploadSuccess"]) && $_SESSION["imageUploadSuccess"] === true)
						{
							header('Location: ./controller/pages/publishStepTwo.php?theme='.$theme);
							exit;	
						}
						else
						{
							$_SESSION["imageError"] = $image;
							header('Location: ./controller/pages/publishStepTwo.php?theme='.$theme);
							exit;	
						}
					}
					else
					{
						header('Location: ./controller/pages/publishStepTwo.php?theme='.$theme);
						exit;
					}*/






		}
		else
		{
			//THE PURPOSE OF REGISTER CLASS IS TO VERIFY DATAS AND TO RETURN TRUE AS RESULT IF ALL IS GOOD OR AN ERROR MESSAGE IF IT IS NOT.
			$publishVerify = new publishVerify($database->getDatabase());
			$result = $publishVerify->checkStepOne($_SESSION["publishTitle"], $_SESSION["publishContent"]);

			if($result === true)
			{
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