<?php
	/**
	* Class untuk mengatur route URL
	* Clean URL (domain.com/class/method/params)
	* Set request --> get controller --> cek controller
	*/
	class Route{
		private $__request; // property untuk menampung request
		private $__controller; // property untuk menampung controller yg di request
	
		public function setURI($request){
			$this->__request = $request;
			return $this; // untuk penggunaan method chaining
		}

		public function getController(){
			$uri = explode('/', $this->__request);
			$class = isset($uri[0]) && ($uri[0] != "") ? $uri[0] : 'home'; // class
			$method = isset($uri[1]) ? $uri[1] : 'index';	// method
			$param = isset($uri[2]) ? $uri[2] : '';	// param

			// explode request class dan method
			$explodeClass = explode('-', $class);
			$explodeMethod = explode('-', $method);

			// cek hasil explode
			if(count($explodeClass) > 1){ // jika lebih dari satu
				$class = "";
				foreach($explodeClass as $value){
					$class .= ucfirst($value);
				}
			}

			// if(count($explodeMethod) > 1){ // jika lebih dari satu
			// 	$method = "";
			// 	foreach($explodeMethod as $value){
			// 		$method .= ucfirst($value);
			// 	}
			// }

			// set request controller - class
			$this->__controller = dirname(__FILE__).DIRECTORY_SEPARATOR.$class.".php";

			// cek file controller
			if(file_exists($this->__controller)){
				echo "Request Tersedia <br>";

				// load controller dan class
				require_once $this->__controller;
				$class = ucfirst($class);
				$obj = new $class();

				if(method_exists($obj, $method)){
					echo "Method Tersedia <br>";

					$obj->$method($param);
				}
				else{
					echo "Method Tidak Tersedia <br>";
					die($this->error());	
				}
			}
			else{
				die($this->error());
			}
		}

		protected function error(){
			echo "Error 404";
		}
	}