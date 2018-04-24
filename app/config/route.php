<?php
	/**
	* 
	*/
	class Route{
		
		private $__request;
		private $__controller;
		// private $_status;

		public function setUri($request){
			// set $_request dari request yg di pinta
			$this->__request = $request;
			return $this;
		}

		public function getUri(){
			echo $this->request;
		}

		public function getController(){
			$uri = explode('/', $this->__request);
			$class = isset($uri[0]) && ($uri[0] != "") ? $uri[0] : DEFAULT_CONTROLLER; // class
			$method = isset($uri[1]) ? $uri[1] : 'index';	// method
			$param = isset($uri[2]) ? $uri[2] : false;	// param

			// set request controller - class
			$this->__controller = ROOT.DS.'app'.DS.'controllers'.DS.$class."Controller.php";

			// cek file controller
			if(file_exists($this->__controller)){
				// echo "Request Tersedia <br>";

				// load controller dan class
				require_once $this->__controller;
				$class = ucfirst($class);
				$obj = new $class();

				if(method_exists($obj, $method)){
					// echo "Method Tersedia <br>";
					$obj->$method();
				}
				else die($this->error()); // method tidak tersedia	
			}
			else die($this->error()); // class tidak tersedia
		}

		protected function error(){
			echo "Error 404";
		}
	}