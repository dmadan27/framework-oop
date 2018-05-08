<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");

	/**
	* Class Example model
	*/
	class ExampleModel extends Database{
		
		protected $koneksi;
		protected $dataTable;

		/**
		* 
		*/
		public function __construct(){
			$this->koneksi = $this->openConnection();
			$this->dataTable = new Datatable();
		}

		/**
		* 
		*/
		public function getAllDataTable($config){
			$this->dataTable->set_config($config);
			$statement = $this->koneksi->prepare($dataTable->getDataTable());
			$statement->execute();
			$result = $statement->fetchAll();

			return $result;
		}

		/**
		* 
		*/
		public function recordFilter(){
			return $this->dataTable->recordFilter();

		}

		/**
		* 
		*/
		public function recordTotal(){
			return $this->dataTable->recordTotal();
		}
		
		/**
		* 
		*/
		public function getAll(){
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

			return $data;
		}

		/**
		* 
		*/
		public function __destruct(){
			$this->closeConnection($this->koneksi);
		}
	}