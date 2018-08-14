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
			$this->beranda();
		}

		/**
		 * 
		 */
		private function beranda(){
			$css = array();
			$js = array();

			$config = array(
				'title' => array(
					'main' => 'Beranda',
					'sub' => 'Dashboard Sistem',
				),
				'css' => $css,
				'js' => $js,
			);

			$this->layout('beranda/home', $config, $data = null);
		}
	}
