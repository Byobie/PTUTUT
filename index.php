<?php 
	//INCLUDE THE OBJECT CLASSES NECESSARY FOR THE CONTROLLER TO WORK.
	require("./controller/class/registerVerify.class.php");
	require("./model/class/makeDataBase.class.php");
	require("./controller/class/connexionVerify.class.php");
	require("./controller/class/publishVerify.class.php");
	require("./controller/class/imageVerify.class.php");

	//STARTING THE SESSION AT THE ROOT.
	session_start();

	//I PUT THE RESET OF THE ERROR MESSAGE FOR REGISTER FORM BECAUSE IT NEEDS TO BE CLEANED AT EVERY TRY AND WHEN THE REGISTER IS SUCESSFULL TOO.
	$_SESSION["registerError"] = "";

	//HERE BEGINS THE CONTROLER SWITCH. IT REQUIRES THE PAGE NUMBER TO REDIRECT THE USER. EACH PAGE HAVE A SPECIFIC AND STATIC PAGE NUMBER. IF THERE IS NO PAGE NUMBER PROVIDED BY THE PARAMETER GET, THE USER IS REDIRECTED TO THE MAIN PAGE. I CHOOSED GET PARAMETER BECAUSE IT'S NOT SENSIBLE DATAS.
	if(isset($_GET["page_number"]) && $_GET["page_number"] >= 0)
	{
		//CALL FOR THE DATABASE. USEFUL FOR THE CONNEXION/REGISTER VERIFICATIONS.
		$database = new makeDatabase("99percents", "localhost", "utf8", 3308, "root", "");

		//THE PAGE NUMBER IS SAVED AND THE THEME TOO, WHICH IS PROVIDED BY A GET PARAMTER.
		$page_number = $_GET["page_number"];
		$theme = $_GET["theme"];

		switch ($page_number)
		{
			//THE PAGE NUMBER ONE IS FOR REGISTER FORM.
			case 1:

				if(isset($_SESSION["connexion"]) && $_SESSION["connexion"] === true)
				{
					$_SESSION["position"] = "FRESH";
			    	header('Location: ./controller/pages/main_page.php?theme='.$theme);
					exit;
				}
				else
				{
					//I UPDATE THE DISPLAYED POSITION WITH A SESSION VARIABLE.
					$_SESSION["position"] = "SIGN UP";

					//TO ENTER THE CONDITION, THE USER MUST FULLFILLED THE FORM FIRST, OTHERWISE, IT WILL BE REDIRECTED TO THE FORM BUT WHITHOUT ERROR MESSAGE.
					if(isset($_POST["formSent"]) && $_POST["formSent"] == 1)
					{
						//THE PURPOSE OF REGISTER CLASS IS TO VERIFY DATAS AND TO RETURN TRUE AS RESULT IF ALL IS GOOD OR AN ERROR MESSAGE IF IT IS NOT.
						$registerCheck = new registerVerify($database->getDatabase());
						$check = $registerCheck->checkRegister($_POST["login"], $_POST["password"], $_POST["confirmPassword"], $_POST["email"]);

						//THE RESULT MUST BE A BOOLEAN TRUE.
						if($check === true)
						{
							$_SESSION["createLogin"] = $_POST["login"];
							$_SESSION["createPassword"] = $_POST["password"];
							$_SESSION["createEmail"] = $_POST["email"];	
							$_SESSION["theme"] = $theme;
							$_SESSION["connexion"] = true;
							unset($_SESSION["registerError"]);
				
							header('Location: ./model/script/create_user.php?theme='.$theme);
							exit;
						}
						else
						{
							//THE SESSION VARIABLE RETURN THE RIGHT ERROR MESSAGE. THE USER IS REDIRECTED TO THE REGISTER FORM.
							$_SESSION["registerError"] = $check;
							header('Location: ./controller/pages/register.php?theme='.$theme);
							exit;
						}
					}
					else
					{
						header('Location: ./controller/pages/register.php?theme='.$theme);
						exit;					
					}
				}

			case 2:

				//THE PAGE NUMBER TWO IS FOR THE DECONNEXION FORM. IT ONLY WORK IF THE USER IS ALREADY CONNECTED, ELSE IF THE USER CHEATS BY REPLACING THE GET PARAMETER IN THE URL, HE WILL BE REDIRECTED TO THE MAIN PAGE.
				if(isset($_SESSION["connexion"]) && $_SESSION["connexion"] === true)
				{
					//THE SESSION IS UNSET THET DESTROYED TO UNSURE A FULL DELETION. THEN THE USER IS REDIRECTED TO MAIN PAGE.
					$_SESSION["connexion"] = false;
					session_unset();
					session_destroy();
					header('Location: ./index.php?theme='.$theme.'&page_number=0');
					exit;
				}
				else
				{
					header('Location: ./controller/pages/main_page.php?theme='.$theme);
					exit;
				}

			case 3:

				if(isset($_SESSION["connexion"]) && $_SESSION["connexion"] === true)
				{
					unset($_SESSION["registerError"]);
					$_SESSION["position"] = "FRESH";								

					header('Location: ./controller/pages/main_page.php?theme='.$theme);
					exit;

				}
				else
				{
					$_SESSION["position"] = "SIGN IN";

					if(isset($_POST["formSent"]) && $_POST["formSent"] == 2)
					{
						//THE PURPOSE OF CONNEXION CLASS IS TO VERIFY DATAS AND TO RETURN TRUE AS RESULT IF ALL IS GOOD OR AN ERROR MESSAGE IF IT IS NOT.
						$connexionCheck = new connexionVerify($database->getDatabase());
						$connexion = $connexionCheck->checkConnexion($_POST["password"], $_POST["login"]);

						//THE RESULT MUST BE A BOOLEAN TRUE.
						if($connexion === true)
						{
							if(isset($_SESSION["publishShortcut"]) && $_SESSION["publishShortcut"] === true)
							{
								$_SESSION["connexion"] = true;
								unset($_SESSION["connexionError"]);
								$_SESSION["position"] = "PUBLISH";							

								header('Location: ./controller/pages/publish.php?theme='.$theme);
								exit;
							}
							else
							{
								//THE USER IS NOW CONNECTED. MESSAGE ERROR IS RESET. POSITION IS UPDATED AS THE USER IS REDIRECTES TO THE MAIN PAGE.
								$_SESSION["connexion"] = true;
								unset($_SESSION["connexionError"]);
								$_SESSION["position"] = "FRESH";							

								header('Location: ./controller/pages/main_page.php?theme='.$theme);
								exit;
							}
						}
						else
						{
							//THE SESSION VARIABLE RETURN THE RIGHT ERROR MESSAGE. THE USER IS REDIRECTED TO THE REGISTER FORM.
							$_SESSION["position"] = "SIGN IN";
							$_SESSION["connexionError"] = $connexion;

							header('Location: ./controller/pages/connexion.php?theme='.$theme);
							exit;
						}
					}
					else
					{
						$_SESSION["position"] = "SIGN IN";
						unset($_SESSION["connexionError"]);
						header('Location: ./controller/pages/connexion.php?theme='.$theme);
						exit;
					}
				}

			case 4:

				unset($_SESSION["publishError"]);
				unset($_SESSION["newsTitle"]);
				unset($_SESSION["newsContent"]);

				if(isset($_SESSION["connexion"]) && $_SESSION["connexion"] === true)
				{
					$_SESSION["position"] = "PUBLISH";

					if(isset($_POST["formSent"]) && $_POST["formSent"] == 3)
					{
						$publishCheck = new publishVerify($database->getDatabase());
						$publish = $publishCheck->checkStepOne($_POST["title"], $_POST["content"]);

						$_SESSION["newsTitle"] = $_POST["title"];
						$_SESSION["newsContent"] = $_POST["content"];

						if($publish === true)
						{
							$_SESSION["publishError"] = "";
							unset($_SESSION["publishError"]);
							$_SESSION["publishController"] = true;
							header('Location: ./controller/pages/publishStepTwo.php?theme='.$theme);
							exit;	
						}
						else
						{
							$_SESSION["publishError"] = $publish;
							header('Location: ./controller/pages/publish.php?theme='.$theme);
							exit;	
						}
					}
					else
					{
						header('Location: ./controller/pages/publish.php?theme='.$theme);
						exit;
					}
				}
				else
				{
					$_SESSION["position"] = "SIGN IN";
					unset($_SESSION["connexionError"]);
					$_SESSION["publishShortcut"] = true;
					header('Location: ./controller/pages/connexion.php?theme='.$theme);
					exit;
				}
		   	 	
			case 5:

				unset($_SESSION["imageError"]);

				if(isset($_POST["formSent"]))
				{
					$_SESSION["formSentImage"] = $_POST["formSent"];
				}

				if(isset($_SESSION["connexion"]) && $_SESSION["connexion"] === true && $_SESSION["publishController"] && $_SESSION["publishController"] === true)
				{
					$_SESSION["position"] = "PUBLISH";

					if(isset($_SESSION["formSentImage"]) && $_SESSION["formSentImage"] == 4)
					{
						$imageCheck = new imageVerify("./model/uploads/", $_FILES["fileToUpload"]);
						$image = $imageCheck->checkImage($_POST["submit"], $_FILES["fileToUpload"]);

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
					}
				}
				else
				{
					$_SESSION["position"] = "SIGN IN";
					unset($_SESSION["connexionError"]);
					$_SESSION["publishShortcut"] = true;
					header('Location: ./controller/pages/connexion.php?theme='.$theme);
					exit;
				}

		    default:

		    	//IF FOR SOME REASONS NO PAGE NUMBER IS GOT BUT THE USER STILL MANAGES TO ENTER THE SWITCH, HE WILL BE REDIRECTED TO THE MAIN PAGE.
		   	 	$_SESSION["position"] = "FRESH";
			    header('Location: ./controller/pages/main_page.php?theme='.$theme);
				exit;
		}
	}
	else
	{
		$_SESSION["position"] = "FRESH";
		header('Location: ./controller/pages/main_page.php?theme=dark');
		exit;
	}

?>