<?php
	/**
	* Class Auth, Pengecekan Authentikasi yg masuk sistem
	*/
	class Auth{
		
		protected $login;
		protected $lockscreen;
		protected $jenis;

		public function __construct(){
			$this->jenis = isset($_POST['jenis']) ? $_POST['jenis'] : false;

			if(($this->jenis) && (strtolower($this->jenis) === 'mobile')) $this->cekAuthMobile();
			else $this->cekAuth();
		}

		private function cekAuth(){
			$this->login = isset($_SESSION['sess_login']) ? $_SESSION['sess_login'] : false;
			$this->lockscreen = isset($_SESSION['sess_locksreen']) ? $_SESSION['sess_locksreen'] : false;

			if(!$this->login && !$this->lockscreen){
				session_unset();
				session_destroy();
				header('Location: '.BASE_URL.'login');
				die();
			}
			else if($this->login && $this->lockscreen){
				unset($_SESSION['login']);
				header('Location: '.BASE_URL.'lockscreen');
				die();
			}
		}

		private function cekAuthMobile(){

		}

		private function getAkses($user){

		}

		private function getToken(){

		}
	}