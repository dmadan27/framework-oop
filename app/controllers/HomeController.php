<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");

	/**
	 * 
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
		 * 
		 */
		public function index(){
			echo "Selamat Datang di Class Home <br>";
		}
	}
