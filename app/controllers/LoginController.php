<?php
	namespace app\controllers;

	class Login{

		protected $username = 'ABCD';
		protected $password = 'ABCD';
		protected $token = 'ABCD';

		public function __construct(){
			# code...
		}

		public function index(){
			$jenis = isset($_POST['jenis']) ? $_POST['jenis'] : false;
			$token = isset($_POST['token']) ? $_POST['token'] : false;

			// cek jenis login
			if($jenis){ // mobile
				// cek isi token

				if (($token == "") || ($token !== $this->token)) {

					// validasi pengguna
					$user = isset($_POST['user']) ? $_POST['user'] : false;
					$pass = isset($_POST['pass']) ? $_POST['pass'] : false;

					if(($user === $this->username) && ($pass === $this->password)){
						echo "Berhasil Masuk (Token Baru)";
					}
					else{
						echo "Gagal";
					}

				}
				else {
					echo "Berhasil Masuk";
				}

			}
			else{ // sistem

			}
		}
	}
