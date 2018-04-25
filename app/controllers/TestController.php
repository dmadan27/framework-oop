<?php
	// namespace app\controllers;

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

		private function list(){
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

		public function form(){
			$id = isset($_GET['id']) ? $_GET['id'] : false;

			// cek jenis form
			if(!$id) $this->add();
			else $this->edit($id);
		}	

		private function add(){
			// tampil form tambah
			echo "Tambah";
		}

		public function actionAdd($data){

		}

		private function edit($id){
			echo "Edit";
		}

		public function actionEdit($data){

		}
	}