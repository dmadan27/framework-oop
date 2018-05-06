<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");
	// namespace app\controllers;

	/**
	* Class home, default controller
	*/
	class Home{

		/**
		* 
		*/
		public function __construct(){
			
		}

		/**
		* Fungsi index
		*/
		public function index(){
			echo "Selamat Datang di Class Home <br>";
		}
	}
