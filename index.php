<?php
	session_start();

	define('ROOT', dirname(__FILE__)); // root file web
	define('DS', DIRECTORY_SEPARATOR); // pemisah direktori '\'

	// load config
	require_once "app/config/config.php";
	require_once "app/config/route.php"; 
	require_once "app/library/Controller.class.php";
	require_once "app/library/Page.class.php";
	require_once "app/library/Auth.class.php";

	$request = isset($_SERVER['PATH_INFO']) ? preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']) : DEFAULT_CONTROLLER;

	// test login
	// $_SESSION['sess_login'] = true;
	// $_SESSION['sess_locksreen'] = false;
	// session_unset();
	// session_destroy();

	$route = new Route();
	$route->setUri($request)->getController();

