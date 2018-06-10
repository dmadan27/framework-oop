<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");
	// namespace app\controllers;

	/**
	* Class login. Untuk melakukan login ke sistem, lockscreen dan logout
	*/
	class Login extends Controller{

		protected $username = 'ABCD'; // kosongkan jika sudah memakai db
		protected $password = 'ABCD'; // kosongkan jika sudah memakai db

		/**
		* Construct. Load class Auth
		*/
		public function __construct(){
			$this->auth();
		}

		/**
		* fungsi index untuk akses utama controller login
		*/
		public function index(){
			if($this->auth->isLogin()) $this->redirect(BASE_URL);
			else{
				if($_SERVER['REQUEST_METHOD'] == "POST") $this->doLogin(); // jika request post login
				else $this->view('login'); // jika bukan, atau hanya menampilkan halaman login
			}
		}

		/**
		* fungsi login untuk sistem
		* pengecekan user dan password berdasarkan jenis user
		* pemberian hak akses berdasarkan level
		* set session default
		* return berupa json
		*/
		protected function doLogin(){
			/** 
			* gunakan ini jika sudah memakai db 

				$this->username = isset($_POST['username']) ? $_POST['username'] : false;
				$this->password = isset($_POST['password']) ? $_POST['password'] : false;
			
			*/

			$username = isset($_POST['username']) ? $_POST['username'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$errorUser = $errorPass = "";

			/** 
			* example get username di db
			
				$dataUser = $this->UserModel->getUser($this->username);
			
			*/

			/**
			* example login ke db

				if(!$dataUser){
					$status = false;
					$errorUser = "Username atau Password Anda Salah";
					$errorPass = $errorUser;
				}
				else{
					if(password_verify($this->password, $dataUser['password'])){
						$status = true;
						$_SESSION['sess_login'] = true;
						$_SESSION['sess_locksreen'] = false;
						$_SESSION['sess_level'] = $dataUser['level'];

						// set data profil sesuai dgn jenis user
						// sesuaikan dengan kebutuhan sistem
					}
					else{
						$status = false;
						$errorUser = "Username atau Password Anda Salah";
						$errorPass = $errorUser;
					}
				}

			*/
				
			/**
			* example login statis
			
				if(($user === $this->username) && ($pass === $this->password)){
					$_SESSION['sess_login'] = true;
					$_SESSION['sess_locksreen'] = false;

					$status = true;
				}
				else{
					$status = false;
					$errorUser = "Username atau Password Anda Salah";
					$errorPass = $errorUser;
				}

			*/

			if(($username === $this->username) && ($password === $this->password)){
				$_SESSION['sess_login'] = true;
				$_SESSION['sess_locksreen'] = false;

				$status = true;
			}
			else{
				$status = false;
				$errorUser = "Username atau Password Anda Salah";
				$errorPass = $errorUser;
			}
				
			$error = array(
				'username' => $errorUser,
				'password' => $errorPass,
			);

			$output = array(
				'status' => $status,
				'error' => $error,
			);

			echo json_encode($output);
		}

		/**
		* Fungsi lockscreen
		* set ulang session login dan session lockscreen saja
		*/
		public function lockscreen(){

		}

		/**
		* Fungsi logout
		* menghapus semua session yang ada
		*/
		public function logout(){
			session_unset();
			session_destroy();

			$this->redirect();
		}
	}
