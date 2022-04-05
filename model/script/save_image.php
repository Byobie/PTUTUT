<?php 

	require("../class/makeDataBase.class.php");
	require("../class/uploadImage.class.php");

	session_start();

	$targetFile = "../upload/";
	$fileToUpload = $_SESSION["fileToUpload"];
	$theme = $_GET["theme"];

	$database = new makeDatabase("99percents", "localhost", "utf8", 3308, "root", "");

	$image = new uploadImage($database->getDatabase(), $targetFile, $fileToUpload);
	$image->moveFile();

	$_SESSION["imageUploadSuccess"] = true;	

	$test = move_uploaded_file($_SESSION["fileToUpload"]["tmp_name"], "../uploads/".$_SESSION["fileToUpload"]["name"]);
	var_dump($fileToUpload["tmp_name"]);
	var_dump($targetFile.$fileToUpload["name"]);		
	var_dump($test);
	var_dump($fileToUpload);				

	/*header('Location: ../../controller/pages/main_page.php?theme='.$theme."&page_number=5");
	exit;*/
?>