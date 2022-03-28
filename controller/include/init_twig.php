<?php

	//__DIR__ .  =  la racine du dossier + concatenation avec chemin du dossier cherché.
	//Je recupere le dossier autoload.
	require_once __DIR__ . '/../../vendor/autoload.php';
	//Je recupere les pages.twig depuis le dossier templates.
	//$loader = new Twig_Loader_Filesystem(__DIR__ . '/../templates');
	$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../view/templates');
	// $twig = objet qui represente le moteur du template Twig.
	//$twig = new Twig_Environment($loader);
	$twig = new \Twig\Environment($loader);

?>