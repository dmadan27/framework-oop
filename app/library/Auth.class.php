<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");
	
	/**
	 * Class Auth
	 * Library untuk pengecekan Authentikasi yg masuk sistem
	 */
	class Auth{
		
		private $login;
		private $lockscreen;
		private $token;

		/**
		 * Method checkAuth
		 * Proses pengecekan status user sudah login atau belum
		 * Jika belum login maka akan diarahkan ke login
		 */
		public function checkAuth(){
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

			if(!$cekTimeout) {$_SESSION['sess_timeout'] = date('Y-m-d H:i:s', time()+(60*60));}
		}

		/**
		 * Method isLogin
		 * Proses pengecekan status login untuk sistem
		 */
		public function isLogin(){
			$this->login = isset($_SESSION['sess_login']) ? $_SESSION['sess_login'] : false;
			$this->timeout = isset($_SESSION['sess_timeout']) ? strtotime($_SESSION['sess_timeout']) : false;

			if(!$this->login) {return false;}
			
			if($this->login && (time() > $this->timeout)){
				$_SESSION['sess_login'] = false;
				$_SESSION['sess_lockscreen'] = true;
				return false;
			}

			return true;
		}

		/**
		 * Method getAccess
		 * 
		 * BUTUH PENGEMBANGAN LEBIH LANJUT
		 */
		private function getAccess($user){

		}

		/**
		 * Method getToken
		 * Proses generate random token yang secure
		 * Dapat digunakan juga untuk token crsf yang akan dipasang disetiap module
		 * @param length {int} default 25. Panjang karakter token yang ingin dibuat
		 * @return token {string} random secure token
		 */
		public function getToken($length = 25){
			$token = "";
		    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		    $codeAlphabet.= "0123456789";
		    $max = strlen($codeAlphabet); // edited

		    for ($i=0; $i < $length; $i++) {
		        $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
		    }

		    return $token;
		}

		/**
		 * Method crypto_rand_secure
		 * Proses generate random secure
		 * @param min {int}
		 * @param max {int}
		 * @param result {int}
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
	}