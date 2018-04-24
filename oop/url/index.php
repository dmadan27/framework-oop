<?php
	include_once "route.php";

	// get request
	$request = isset($_SERVER['PATH_INFO']) ? preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']) : 'home';
	
	// run Class Route
	$route = new Route();
	// set URI dan get Controller
	$route->setURI($request)->getController();

