<?php
	/**
	* Parent class
	*/
	class Kucing{
		private $mata = 2;
		private $bulu;
		private $kaki = 4;
		private $ekor;
		private $jenis;

		public function __construct($nama){
			echo "Nama Kucing ini adalah ".$nama;
		}

		public function jalan(){
			return "Sedang Jalan....";
		}

		public function lari(){
			return "Sedang Lari....";
		}

		public function meong(){
			return "Meoongggg.. Meonggg...";
		}

		// untuk mencegah method overriding
		// final public function meong(){
		// 	return "Meoongggg.. Meonggg...";
		// }

		public function setEkor($ekor){
			$this->ekor = $ekor;
			return $this;
		}

		public function getEkor(){
			return $this->ekor;
		}
	}

	/**
	* child class dari class kucing
	*/
	class Anggora extends Kucing{
		
		public function __construct(){
			# code...
		}

		public function setJenis($jenis){
			$this->jenis = $jenis;
			return $this;
		}

		public function getJenis(){
			return $this->jenis;
		}

		public function meong(){
			return "Meong aja meng...";
		}
	}

	$kucing = new Kucing('Ujang Jeprut');
	echo "\n".$kucing->meong()."\n";	

	$anggora = new Anggora();
	// $anggora = new Anggora;
	// $anggora = new Anggora("ikeh ikeh mas");
	echo $anggora->meong()."\n";
	echo $kucing->meong()."\n";
	echo $anggora->setJenis('Anggora')->getJenis();



