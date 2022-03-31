<?php 

	require("./class/makeDataBase.class.php");
	require("./class/user.class.php");

	session_start();

	$theme = $_SESSION["theme"];

	$database = new makeDatabase("99percents", "localhost", "utf8", 3308, "root", "");

	$user = new user($database->getDatabase());
	$user->createUser($_SESSION["createPassword"], $_SESSION["createLogin"], $_SESSION["createEmail"]);

	unset($_SESSION["createLogin"]);
	unset($_SESSION["createPassword"]);
	unset($_SESSION["createEmail"]);
	unset($_SESSION["theme"]);								

	header('Location: ../controller/pages/main_page.php?theme='.$theme."&page_number=0");
	exit;
?>