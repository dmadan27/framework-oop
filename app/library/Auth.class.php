<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");
	
	/**
	 * Class Auth, Pengecekan Authentikasi yg masuk sistem
	 */
	class Auth{
		
		protected $login;
		protected $lockscreen;
		protected $token;

		/**
		 * Fungsi cek auth sistem
		 * Untuk mengecek status user sudah login atau belum
		 * jika belum login maka akan diarahkan ke login
		 */
		public function cekAuth(){
			if(!$this->isLogin()){
				$this->lockscreen = isset($_SESSION['sess_lockscreen']) ? $_SESSION['sess_lockscreen'] : false;

				// cek lockscreen
				if($this->lockscreen){
					$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					header('Location: '.BASE_URL.'login/lockscreen/?callback='.$actual_link);
					die();
				}
				else{
					session_unset();
					session_destroy();
					header('Location: '.BASE_URL.'login');
					die();
				}
			}

			// param khusus untuk notifikasi atau req dari ajax yg tidak reload halaman
			$cekTimeout = isset($_POST['timeout']) ? $_POST['timeout'] : false;

			if(!$cekTimeout) $_SESSION['sess_timeout'] = date('Y-m-d H:i:s', time()+(60*60));
		}

		/**
		 * pengecekan status login untuk sistem dan mobile
		 */
		public function isLogin(){
			$this->login = isset($_SESSION['sess_login']) ? $_SESSION['sess_login'] : false;
			$this->timeout = isset($_SESSION['sess_timeout']) ? strtotime($_SESSION['sess_timeout']) : false;

			if(!$this->login) 
				return false;
			
			if($this->login && (time() > $this->timeout)){
				$_SESSION['sess_login'] = false;
				$_SESSION['sess_lockscreen'] = true;
				return false;
			}

			return true;
		}

		/**
		*
		*/
		private function getAkses($user){

		}

		/**
		* Fungsi untuk mendapatkan token yang sudah di generate
		* Dapat digunakan juga untuk token crsf yang akan dipasang disetiap module
		*/
		public function getToken(){
			$token = "";
		    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		    $codeAlphabet.= "0123456789";
		    $max = strlen($codeAlphabet); // edited

		    for ($i=0; $i < 15; $i++) {
		        $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
		    }

		    return $token;
		}

		/**
		* Fungsi untuk generate random yang secure
		*/
		private function crypto_rand_secure($min, $max){
		    $range = $max - $min;
		    if ($range < 1) return $min; // not so random...
		    $log = ceil(log($range, 2));
		    $bytes = (int) ($log / 8) + 1; // length in bytes
		    $bits = (int) $log + 1; // length in bits
		    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
		    do {
		        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
		        $rnd = $rnd & $filter; // discard irrelevant bits
		    } while ($rnd > $range);
		    return $min + $rnd;
		}

		/**
		* Fungsi untuk mengecek token yang dikirim ke client apakah sama dengan token yg di session
		*/
		public function cekToken($sess_token, $token, $modul){
			if(!password_verify($sess_token, $token)){
				header('Location: '.BASE_URL.$modul.'/');
				die();
			}
		}
	}