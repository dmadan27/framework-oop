<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");
	// namespace app\controllers;

	/**
	 * Class login. Untuk melakukan login ke sistem, lockscreen dan logout 
	 */
	class Login extends Controller {

		protected $username = 'ABCD'; // kosongkan jika sudah memakai db
		protected $password = 'ABCD'; // kosongkan jika sudah memakai db

		/**
		 * Construct. Load class Auth
		 */
		public function __construct() {
			$this->auth();
		}

		/**
		 * fungsi index untuk akses utama controller login
		 */
		public function index() {
			if($this->auth->isLogin()) $this->redirect(BASE_URL);
			else {
				$_SESSION['sess_lockscreen'] = false;
				
				if($_SERVER['REQUEST_METHOD'] == "POST") $this->doLogin(); // jika request post login
				else $this->view('login'); // jika bukan, atau hanya menampilkan halaman login
			}
		}

		/**
		 * fungsi login untuk sistem
		 * pengecekan user dan password berdasarkan jenis user
		 * pemberian hak akses berdasarkan level
		 * set session default
		 * @return json
		 */
		protected function doLogin($callback = false) {
			/** 
			* gunakan ini jika sudah memakai db 

				$this->username = isset($_POST['username']) ? $_POST['username'] : false;
				$this->password = isset($_POST['password']) ? $_POST['password'] : false;
			
			*/

			$username = isset($_POST['username']) ? $_POST['username'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$errorUser = $errorPass = "";
			$notif = $error = array();

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
					$notif = array(
						'title' => '',
						'message' => '',
						'type' => '',
					);
				}
				else{
					if(password_verify($this->password, $dataUser['password'])){
						$status = true;
						// bisa berdasarkan level / tentukan secara manual
						$this->setSession($dataUser['level']);
					}
					else{
						$status = false;
						$errorUser = "Username atau Password Anda Salah";
						$errorPass = $errorUser;
						$notif = array(
							'title' => '',
							'message' => '',
							'type' => '',
						);
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

			if(($username === $this->username) && ($password === $this->password)) {
				$this->setSession();

				$status = true;
			}
			else {
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
				'callback' => $callback,
				'error' => $error,
				'notif' => $notif,
			);

			echo json_encode($output);
		}

		/**
		 * 
		 */
		private function setSession($level = false){
			// get data profil
			// $dataProfil = $this->UserModel->getProfil($this->username);

			// set data profil sesuai dgn jenis user
			
			// cek kondisi foto
			/*
				if(!empty($dataProfil['foto'])){
					// cek foto di storage
					$filename = ROOT.DS.'assets'.DS.'images'.DS.'user'.DS.$dataProfil['foto'];
					if(!file_exists($filename))
						$foto = BASE_URL.'assets/images/user/default.jpg';
					else
						$foto = BASE_URL.'assets/images/user/'.$dataProfil['foto'];
				}
				else $foto = BASE_URL.'assets/images/user/default.jpg';
				
				$_SESSION['sess_login'] = true;
				$_SESSION['sess_lockscreen'] = false;
				$_SESSION['sess_level'] = $level;
				$_SESSION['sess_id'] = $dataProfil['id'];
				$_SESSION['sess_nama'] = $dataProfil['nama'];
				$_SESSION['sess_alamat'] = $dataProfil['alamat'];
				$_SESSION['sess_telp'] = $dataProfil['no_telp'];
				$_SESSION['sess_email'] = $dataProfil['email'];
				$_SESSION['sess_foto'] = $foto;
				$_SESSION['sess_status'] = $dataProfil['status'];
				$_SESSION['sess_welcome'] = true;
				$_SESSION['sess_timeout'] = date('Y-m-d H:i:s', time()+(60*60)); // 1 jam idle
				// $_SESSION['sess_akses'] = '';
			*/

			$_SESSION['sess_login'] = true;
			$_SESSION['sess_lockscreen'] = false;
			$_SESSION['sess_level'] = "";
			$_SESSION['sess_id'] = "";
			$_SESSION['sess_nama'] = "";
			$_SESSION['sess_alamat'] = "";
			$_SESSION['sess_telp'] = "";
			$_SESSION['sess_email'] = "";
			$_SESSION['sess_foto'] = "";
			$_SESSION['sess_status'] = "";
			$_SESSION['sess_welcome'] = true;
			$_SESSION['sess_timeout'] = date('Y-m-d H:i:s', time()+(60*60)); // 1 jam idle
		}

		/**
		 * Fungsi lockscreen
		 * set ulang session login dan session lockscreen saja
		 */
		public function lockscreen() {
			$lockscreen = isset($_SESSION['sess_lockscreen']) ? $_SESSION['sess_lockscreen'] : false;
			$callback = isset($_GET['callback']) ? $_GET['callback'] : false;

			if(!$lockscreen) $this->redirect(BASE_URL);
			else{
				if($_SERVER['REQUEST_METHOD'] == "POST") $this->doLogin($callback); // jika request post login
				else $this->view('lockscreen'); // jika bukan, atau hanya menampilkan halaman login
			}
		}

		/**
		 * Fungsi logout
		 * menghapus semua session yang ada
		 */
		public function logout() {
			session_unset();
			session_destroy();

			$this->redirect();
		}
	}
