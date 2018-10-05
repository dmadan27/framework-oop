<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");
	
	/**
	 * Class DataTable
	 * Library khusus untuk akses DataTable.js via server side
	 */
	class Datatable extends Database{
		
		private $table; // nama tabel
		private $columnOrder; // kolom2 yg akan di order
		private $columnSearch; // kolom2 yg akan dicari
		private $orderBy; // jenis pengurutan data
		private $where; // where clause
		private $query; // query

		/**
		 * Method set_config
		 * Proses set config DataTable
		 * @param config {array}
		 * 	$config = array (
		 * 		'tabel' => '...', // berupa string, nama tabel atau view
		 * 		'columnOrder' => array(...), // berupa array, apa saja yang dapat diorder
		 * 		'columnSearch' => array(...), // berupa array, apa saja yang dapat dicari
		 * 		'orderBy' => array(...), // berupa array apa yg di order, dan valuenya jenis order
		 * 		'where' => '...' // berupa string, yaitu Where manual
		 * 	);
		 */
		final public function set_config($config){
			// set tabel
			$this->table = $config['tabel'];
			// set kolom order
			$this->columnOrder = $config['kolomOrder'];
			// set kolom cari
			$this->columnSearch = $config['kolomCari'];
			// set order by
			$this->orderBy = $config['orderBy'];
			// set kondisi
			$this->where = $config['kondisi'];
		}

		/**
		* Fungsi set query awal default untuk datatable
		*/
		/**
		 * Method setDataTable
		 * Proses set query awal default untuk datatable
		 * @return query {string}
		 */
		final public function setDataTable(){
			$search = isset($_POST['search']['value']) ? $_POST['search']['value'] : false;
			$order = isset($_POST['order']) ? $_POST['order'] : false;

			// $this->query = "SELECT * FROM $this->tabel ";
			$query = "SELECT * FROM $this->table ";

			if($this->where === false){
				// jika ada request pencarian
				$qWhere = "";
				$i = 0;
				foreach($this->columnSearch as $cari){
					if($search){
						if($i === 0) $qWhere .= 'WHERE '.$cari.' LIKE "%'.$search.'%" ';
						else $qWhere .= 'OR '.$cari.' LIKE "%'.$search.'%"';
					}
					$i++;
				}
			}
			else{
				// jika ada request pencarian
				$qWhere = $this->where;
				$i = 0;
				foreach($this->columnSearch as $cari){
					if($search){
						if($i === 0) $qWhere .= ' AND ('.$cari.' LIKE "%'.$search.'%" ';
						else $qWhere .= 'OR '.$cari.' LIKE "%'.$search.'%"';
					}
					$i++;
				}
				if($search) $qWhere .= " )";
			}

			// jika ada request order
			$qOrder = "";
			if($order) $qOrder = 'ORDER BY '.$this->columnOrder[$order[0]['column']].' '.$order[0]['dir'].' ';
			else {
				if($this->orderBy === false) $qOrder = "";
				else $qOrder = 'ORDER BY '.key($this->orderBy).' '.$this->orderBy[key($this->orderBy)]; // order default
			}

			return $query .= "$qWhere $qOrder ";
		}

		/**
		 * Method getDataTable
		 * Proses get full query untuk DataTable
		 * @return query {string}
		 */
		final public function getDataTable(){
			$this->query = $this->setDataTable();

			$qLimit = "";
			if($_POST['length'] != -1) $qLimit .= 'LIMIT '.$_POST['start'].', '.$_POST['length'];
			
			$this->query .= "$qLimit";
			
			return $this->query; 
		}

		/**
		 * Method recordFilter
		 * Proses get filter record, sebagai pendukung dalam pagenation datatable
		 * @return rowCount {int}
		 */
		final public function recordFilter(){
			$koneksi = $this->openConnection();

			// $statement = $koneksi->prepare($this->query);
			$statement = $koneksi->prepare($this->setDataTable());
			$statement->execute();

			return $statement->rowCount();
		}

		/**
		 * Method recordTotal
		 * Proses get semua jumlah data, sebagai pendukung dalam pagenation datatable
		 * @return statement {int}
		 */
		final public function recordTotal(){
			$connection = $this->openConnection();

			if($this->where === false) $statement = $connection->query("SELECT COUNT(*) FROM $this->table")->fetchColumn();
			else $statement = $connection->query("SELECT COUNT(*) FROM $this->table $this->where")->fetchColumn();
			
			return $statement;
		}

	}