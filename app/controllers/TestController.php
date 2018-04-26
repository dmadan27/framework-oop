<?php
	// namespace app\controllers;

	/**
	* 
	*/
	class Test extends Controller{
		
		public function __construct(){
			$this->model('TestModel');
			// $this->view();
		}

		public function index(){
			$this->list();
		}

		private function list(){
			$css = array('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');
			$js = array(
				'assets/bower_components/datatables.net/js/jquery.dataTables.min.js', 
				'assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
				'app/views/test/js/initList.js',
			);

			$config = array(
				'title' => array(
					'main' => 'Data Test',
					'sub' => 'Ini adalah halaman test, yang mengadung data test',
				),
				'css' => $css,
				'js' => $js,
			);

			$data = $this->TestModel->getAll();
			
			$this->layout('test/list', $config, $data);
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