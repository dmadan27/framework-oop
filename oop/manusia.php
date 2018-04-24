<?php
	/**
	* 
	*/
	class Manusia{
		public $kelamin = 'Pria';
		public $rekening = 0;
		
		public function getJK(){
			return $this->kelamin;
		}

		public function nabung($uang){
			$this->rekening += $uang;
			return $this;
		}

		public function transfer($uang){
			$this->rekening -= $uang;
			return $this;
		}
	}

	$manusia = new Manusia();
	// echo $manusia->getJK();
	echo $manusia->nabung(10000)->transfer(5000)->rekening;