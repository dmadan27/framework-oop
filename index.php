<?php
	session_start();

	define('ROOT', dirname(__FILE__)); // root file web
	define('DS', DIRECTORY_SEPARATOR); // pemisah direktori '\'

	// load config
	require_once "app/config/config.php";
	require_once "app/config/route.php"; 
	require_once "app/library/Controller.class.php";
	require_once "app/library/Page.class.php";

	$request = isset($_SERVER['PATH_INFO']) ? preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']) : DEFAULT_CONTROLLER;

	$route = new Route();
	$route->setUri($request)->getController();

	// $page = new Page();

	// $css = array(
	// 	'main.css', 'a.css'
	// );

	// $js = array(
	// 	'main.js', 'a.js'
	// );
	
	// $config = array(
	// 	'title' => array(
	// 		'main' => 'mainTitle',
	// 		'sub' => 'subTitle',
	// 	),
	// 	'css' => $css,
	// 	'js' => $js,
	// );

	// echo "<pre>";
	// var_dump($config);

