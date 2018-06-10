<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");
	// namespace app\controllers;

	/**
	* Example Controller
	*/
	class Example extends CrudAbstract{
		
		protected $token;

		/**
		* 
		*/
		public function __construct(){
			$this->auth();
			$this->auth->cekAuth();
			$this->model('ExampleModel');
		}

		/**
		* 
		*/
		public function index(){
			$this->list();
		}

		/**
		* 
		*/
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
			
			$this->layout('example/list', $config);
		}

		/**
		* 
		*/
		public function form($id){
			if($id)	$this->edit($id);
			else $this->add();
		}	

		/**
		* 
		*/
		protected function add(){
			echo "Tambah";
		}

		/**
		* 
		*/
		public function actionAdd(){

		}

		/**
		* 
		*/
		protected function edit($id){
			echo "Edit";
		}

		/**
		* 
		*/
		public function actionEdit(){

		}

		/**
		*
		*/
		public function detail($id){

		}

		/**
		*
		*/
		public function delete($id){

		}

		/**
		*
		*/
		public function export(){

		}

		/**
		*
		*/
		private function set_validation($data){
			
		}
	}