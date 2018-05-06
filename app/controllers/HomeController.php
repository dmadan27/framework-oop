<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");
	// namespace app\controllers;

	/**
	* Class home, default controller
	*/
	class Home extends Controller{

		/**
		* 
		*/
		public function __construct(){
			$this->auth();
			$this->auth->cekAuth();
		}

		/**
		* Fungsi index
		*/
		public function index(){
			echo "Selamat Datang di Class Home <br>";
		}
	}
