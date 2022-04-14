<?php

$pageNumber = $_GET["pageNumber"];

switch ($pageNumber) 
{
	case 0 :

		if(isset($_SESSION["publishSource"]))
		{
			unset($_SESSION["publishSource"]);
		}

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

		if(isset($_SESSION["publishCategoryError"]))
		{
			unset($_SESSION["publishCategoryError"]);
		}

		if(isset($_SESSION["imagePublishMessage"]))
		{
			unset($_SESSION["imagePublishMessage"]);
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

		if(isset($_SESSION["publishStepThree"]))
		{
			unset($_SESSION["publishStepThree"]);
		}

		if(isset($_SESSION["publishStepFour"]))
		{
			unset($_SESSION["publishStepFour"]);
		}

		if(isset($_SESSION["imagePublishError"]))
		{
			unset($_SESSION["imagePublishError"]);
		}		

		if(isset($_SESSION["publishCategorySelected"]))
		{
			unset($_SESSION["publishCategorySelected"]);
		}	

		if(isset($_SESSION["publishImageUploaded"]))
		{
			unset($_SESSION["publishImageUploaded"]);
		}	

		if(isset($_SESSION["publishImageSkip"]))
		{
			unset($_SESSION["publishImageSkip"]);
		}	

		if(isset($_SESSION["publishImageName"]))
		{
			unset($_SESSION["publishImageName"]);
		}

		if(isset($_SESSION["imagePublishSuccess"]))
		{
			unset($_SESSION["imagePublishSuccess"]);
		}	

		if(isset($_SESSION["publishShortcut"]))
		{
			unset($_SESSION["publishShortcut"]);
		}	

		if(isset($_SESSION["publishSourceError"]))
		{
			unset($_SESSION["publishSourceError"]);
		}

		break;

	case 1 :

		if(isset($_SESSION["connexionError"]))
		{
			unset($_SESSION["connexionError"]);
		}

		if(isset($_SESSION["publishError"]))
		{
			unset($_SESSION["publishError"]);
		}

		if(isset($_SESSION["publishCategoryError"]))
		{
			unset($_SESSION["publishCategoryError"]);
		}

		if(isset($_SESSION["imagePublishMessage"]))
		{
			unset($_SESSION["imagePublishMessage"]);
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

		if(isset($_SESSION["publishStepThree"]))
		{
			unset($_SESSION["publishStepThree"]);
		}

		if(isset($_SESSION["publishStepFour"]))
		{
			unset($_SESSION["publishStepFour"]);
		}

		if(isset($_SESSION["imagePublishError"]))
		{
			unset($_SESSION["imagePublishError"]);
		}		

		if(isset($_SESSION["publishImageUploaded"]))
		{
			unset($_SESSION["publishImageUploaded"]);
		}	

		if(isset($_SESSION["publishImageSkip"]))
		{
			unset($_SESSION["publishImageSkip"]);
		}	

		if(isset($_SESSION["publishImageName"]))
		{
			unset($_SESSION["publishImageName"]);
		}

		if(isset($_SESSION["imagePublishSuccess"]))
		{
			unset($_SESSION["imagePublishSuccess"]);
		}

		if(isset($_SESSION["publishSource"]))
		{
			unset($_SESSION["publishSource"]);
		}	

		if(isset($_SESSION["publishSourceError"]))
		{
			unset($_SESSION["publishSourceError"]);
		}

		break;	

	case 2 :

		if(isset($_SESSION["connexionError"]))
		{
			unset($_SESSION["connexionError"]);
		}

		if(isset($_SESSION["registerError"]))
		{
			unset($_SESSION["registerError"]);
		}

		if(isset($_SESSION["publishError"]))
		{
			unset($_SESSION["publishError"]);
		}

		if(isset($_SESSION["publishCategoryError"]))
		{
			unset($_SESSION["publishCategoryError"]);
		}

		if(isset($_SESSION["imagePublishMessage"]))
		{
			unset($_SESSION["imagePublishMessage"]);
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

		if(isset($_SESSION["publishStepThree"]))
		{
			unset($_SESSION["publishStepThree"]);
		}

		if(isset($_SESSION["publishStepFour"]))
		{
			unset($_SESSION["publishStepFour"]);
		}

		if(isset($_SESSION["imagePublishError"]))
		{
			unset($_SESSION["imagePublishError"]);
		}		

		if(isset($_SESSION["publishImageUploaded"]))
		{
			unset($_SESSION["publishImageUploaded"]);
		}	

		if(isset($_SESSION["publishImageSkip"]))
		{
			unset($_SESSION["publishImageSkip"]);
		}	

		if(isset($_SESSION["publishImageName"]))
		{
			unset($_SESSION["publishImageName"]);
		}

		if(isset($_SESSION["imagePublishSuccess"]))
		{
			unset($_SESSION["imagePublishSuccess"]);
		}	

		if(isset($_SESSION["publishSource"]))
		{
			unset($_SESSION["publishSource"]);
		}

		if(isset($_SESSION["publishSourceError"]))
		{
			unset($_SESSION["publishSourceError"]);
		}

		break;	

	case 3 :

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

		if(isset($_SESSION["publishStepTwo"]))
		{
			unset($_SESSION["publishStepTwo"]);
		}

		if(isset($_SESSION["publishStepThree"]))
		{
			unset($_SESSION["publishStepThree"]);
		}

		if(isset($_SESSION["publishStepFour"]))
		{
			unset($_SESSION["publishStepFour"]);
		}

		if(isset($_SESSION["imagePublishError"]))
		{
			unset($_SESSION["imagePublishError"]);
		}	

		if(isset($_SESSION["publishImageUploaded"]))
		{
			unset($_SESSION["publishImageUploaded"]);
		}	

		if(isset($_SESSION["publishImageSkip"]))
		{
			unset($_SESSION["publishImageSkip"]);
		}	

		if(isset($_SESSION["publishImageName"]))
		{
			unset($_SESSION["publishImageName"]);
		}

		if(isset($_SESSION["imagePublishSuccess"]))
		{
			unset($_SESSION["imagePublishSuccess"]);
		}	

		if(isset($_SESSION["publishSource"]))
		{
			unset($_SESSION["publishSource"]);
		}	

		if(isset($_SESSION["publishSourceError"]))
		{
			unset($_SESSION["publishSourceError"]);
		}

		break;

	case 4 :

		if(isset($_SESSION["connexionError"]))
		{
			unset($_SESSION["connexionError"]);
		}

		if(isset($_SESSION["registerError"]))
		{
			unset($_SESSION["registerError"]);
		}

		if(isset($_SESSION["publishCategoryError"]))
		{
			unset($_SESSION["publishCategoryError"]);
		}

		if(isset($_SESSION["publishStepThree"]))
		{
			unset($_SESSION["publishStepThree"]);
		}

		if(isset($_SESSION["publishStepFour"]))
		{
			unset($_SESSION["publishStepFour"]);
		}

		if(isset($_SESSION["publishSourceError"]))
		{
			unset($_SESSION["publishSourceError"]);
		}

		break;

	case 5 :

		if(isset($_SESSION["connexionError"]))
		{
			unset($_SESSION["connexionError"]);
		}

		if(isset($_SESSION["registerError"]))
		{
			unset($_SESSION["registerError"]);
		}

		if(isset($_SESSION["publishError"]))
		{
			unset($_SESSION["publishError"]);
		}

		if(isset($_SESSION["publishCategoryError"]))
		{
			unset($_SESSION["publishCategoryError"]);
		}
	
		if(isset($_SESSION["publishSourceError"]))
		{
			unset($_SESSION["publishSourceError"]);
		}

		break;

	case 6 :

		if(isset($_SESSION["connexionError"]))
		{
			unset($_SESSION["connexionError"]);
		}

		if(isset($_SESSION["registerError"]))
		{
			unset($_SESSION["registerError"]);
		}

		if(isset($_SESSION["publishError"]))
		{
			unset($_SESSION["publishError"]);
		}

		if(isset($_SESSION["publishSourceError"]))
		{
			unset($_SESSION["publishSourceError"]);
		}

		break;

	case 7 :

		if(isset($_SESSION["connexionError"]))
		{
			unset($_SESSION["connexionError"]);
		}

		if(isset($_SESSION["registerError"]))
		{
			unset($_SESSION["registerError"]);
		}

		if(isset($_SESSION["publishError"]))
		{
			unset($_SESSION["publishError"]);
		}

		if(isset($_SESSION["publishCategoryError"]))
		{
			unset($_SESSION["publishCategoryError"]);
		}	

		break;

	default :

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

		if(isset($_SESSION["publishCategoryError"]))
		{
			unset($_SESSION["publishCategoryError"]);
		}

		if(isset($_SESSION["imagePublishMessage"]))
		{
			unset($_SESSION["imagePublishMessage"]);
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

		if(isset($_SESSION["publishStepThree"]))
		{
			unset($_SESSION["publishStepThree"]);
		}

		if(isset($_SESSION["publishStepFour"]))
		{
			unset($_SESSION["publishStepFour"]);
		}

		if(isset($_SESSION["imagePublishError"]))
		{
			unset($_SESSION["imagePublishError"]);
		}		

		if(isset($_SESSION["publishCategorySelected"]))
		{
			unset($_SESSION["publishCategorySelected"]);
		}	

		if(isset($_SESSION["publishImageUploaded"]))
		{
			unset($_SESSION["publishImageUploaded"]);
		}	

		if(isset($_SESSION["publishImageSkip"]))
		{
			unset($_SESSION["publishImageSkip"]);
		}	

		if(isset($_SESSION["publishImageName"]))
		{
			unset($_SESSION["publishImageName"]);
		}

		if(isset($_SESSION["imagePublishSuccess"]))
		{
			unset($_SESSION["imagePublishSuccess"]);
		}

		if(isset($_SESSION["publishSource"]))
		{
			unset($_SESSION["publishSource"]);
		}

		if(isset($_SESSION["publishSourceError"]))
		{
			unset($_SESSION["publishSourceError"]);
		}

		break;
	}

?>