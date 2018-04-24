<?php
	/**
	* 
	*/
	class Kucing{
		protected $jenis;

		public function __construct(){
			// $this->meong();
		}

		public function setJenis($jenis){
			$this->jenis = $jenis;
		}

		public function getJenis(){
			return $this->jenis;
		}
	}

	/**
	* 
	*/
	class Anggora extends Kucing{
		
		public function __construct(){
			# code...
		}
	}

	$anggora = new Anggora();
	$anggora->setJenis('Kampung');
	echo $anggora->getJenis();
	// echo $kucing->getJenis();