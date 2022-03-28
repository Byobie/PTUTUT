<?php 
	//INCLUDE THE OBJECT CLASSES NECESSARY FOR THE CONTROLLER TO WORK.
	require("./controller/class/register.class.php");
	require("./model/class/makeDataBase.class.php");
	require("./model/class/user.class.php");

	//STARTING THE SESSION AT THE ROOT.
	session_start();

	//I PUT THE RESET OF THE ERROR MESSAGE FOR REGISTER FORM BECAUSE IT NEEDS TO BE CLEANED AT EVERY TRY AND WHEN THE REGISTER IS SUCESSFULL TOO.
	$_SESSION["registerError"] = "";


	//CALL FOR THE DATABASE. USEFUL FOR THE CONNEXION/REGISTER VERIFICATIONS.
	$database = new makeDatabase("99percents", "localhost", "utf8", 3308, "root", "");

	//HERE BEGINS THE CONTROLER SWITCH. IT REQUIRES THE PAGE NUMBER TO REDIRECT THE USER. EACH PAGE HAVE A SPECIFIC AND STATIC PAGE NUMBER. IF THERE IS NO PAGE NUMBER PROVIDED BY THE PARAMETER GET, THE USER IS REDIRECTED TO THE MAIN PAGE. I CHOOSED GET PARAMETER BECAUSE IT'S NOT SENSIBLE DATAS.
	if(isset($_GET["page_number"]) && $_GET["page_number"] >= 0)
	{
		//THE PAGE NUMBER IS SAVED AND THE THEME TOO, WHICH IS PROVIDED BY A GET PARAMTER.
		$page_number = $_GET["page_number"];
		$theme = $_GET["theme"];

		switch ($page_number) 
		{
			//THE PAGE NUMBER ONE IS FOR REGISTER FORM.
			case 1:

				//I UPDATE THE DISPLAYED POSITION WITH A SESSION VARIABLE.
				$_SESSION["position"] = "REGISTER";

				//TO ENTER THE CONDITION, THE USER MUST FULLFILLED THE FORM FIRST, OTHERWISE, IT WILL BE REDIRECTED TO THE FORM BUT WHITHOUT ERROR MESSAGE.
				if(isset($_POST["formSent"]) && $_POST["formSent"] == 1)
				{
					//THE PURPOSE OF REGISTER CLASS IS TO VERIFY DATAS AND TO RETURN TRUE AS RESULT IF ALL IS GOOD OR AN ERROR MESSAGE IF IT IS NOT.
					$registerCheck = new register($database->getDatabase());
					$check = $registerCheck->checkRegister($_POST["login"], $_POST["password"], $_POST["confirmPassword"], $_POST["email"]);

					//THE RESULT MUST BE A BOOLEAN TRUE.
					if($check === true)
					{
						//I CREATE A NEW USER, WHICH IT INSERTED INTO THE DATABASE. PASSWORD IS ENCRYPTED, EVENTUAL BLANK SPACES ARE TRIMMED.
						$user = new user($database->getDatabase());
						$user->createUser($_POST["password"], $_POST["login"], $_POST["email"]);

						//THE USER IS NOW CONNECTED. MESSAGE ERROR IS RESET. POSITION IS UPDATED AS THE USER IS REDIRECTES TO THE MAIN PAGE.
						$_SESSION["connexion"] = true;
						$_SESSION["registerError"] == "";
						$_SESSION["position"] = "FRESH";								

						header('Location: ./controller/pages/main_page.php?theme='.$theme.'&page_number=0');
						exit;
					}
					else
					{
						//THE SESSION VARIABLE RETURN THE RIGHT ERROR MESSAGE. THE USER IS REDIRECTED TO THE REGISTER FORM.
						$_SESSION["registerError"] = $check;
						header('Location: ./controller/pages/register.php?theme='.$theme.'&page_number=1');
						exit;
					}
				}
				else
				{
					header('Location: ./controller/pages/register.php?theme='.$theme.'&page_number=1');
					exit;					
				}

			case 2:

				//THE PAGE NUMBER TWO IS FOR THE DECONNEXION FORM. IT ONLY WORK IF THE USER IS ALREADY CONNECTED, ELSE IF THE USER CHEATS BY REPLACING THE GET PARAMETER IN THE URL, HE WILL BE REDIRECTED TO THE MAIN PAGE.
				if($_SESSION["connexion"] === true)
				{
					//THE SESSION IS UNSET THET DESTROYED TO UNSURE A FULL DELETION. THEN THE USER IS REDIRECTED TO MAIN PAGE.
					session_unset();
					session_destroy();
					header('Location: ./index.php');
					exit;
				}
				else
				{
					header('Location: ./controller/pages/main_page.php?theme='.$theme.'&page_number=0');
					exit;
				}

		    default:

		    	//IF FOR SOME REASONS NO PAGE NUMBER IS GOT BUT THE USER STILL MANAGES TO ENTER THE SWITCH, HE WILL BE REDIRECTED TO THE MAIN PAGE.
		   	 	$_SESSION["position"] = "FRESH";
			    header('Location: ./controller/pages/main_page.php?theme='.$theme.'&page_number=0');
				exit;
		}
	}
	else
	{
		$_SESSION["position"] = "FRESH";
		header('Location: ./controller/pages/main_page.php?theme=dark&page_number=0');
		exit;
	}

?>