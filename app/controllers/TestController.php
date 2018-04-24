<?php
	/**
	* 
	*/
	class Test{
		
		public function __construct(){
			echo "Selamat Datang di Class Test <br>";
		}

		public function index(){
			$this->list();
		}

		public function list(){
			$data = array(
				array(
					'nama' => 'Ujang Jeprut',
					'umur' => 20,
				),
				array(
					'nama' => 'Ujang Jeprut',
					'umur' => 20,
				),
				array(
					'nama' => 'Ujang Jeprut',
					'umur' => 20,
				),
				array(
					'nama' => 'Ujang Jeprut',
					'umur' => 20,
				),
				array(
					'nama' => 'Ujang Jeprut',
					'umur' => 20,
				),
			);

			// echo "<pre>".json_encode($data);
			require_once ROOT.DS."app".DS."view".DS."test.php";
		}	
	}