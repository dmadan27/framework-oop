<?php
	abstract class BangunDatar{
		abstract protected function hitungLuas($panjang, $lebar);

		abstract protected function nama();
	}

	/**
	* 
	*/
	class Persegi extends BangunDatar{
		public $sisi = 4;

		public function __construct(){
			echo "Class Persegi";
		}

		public function nama(){
			return "Persegi aja deh namanya";
		}

		public function hitungLuas($panjang, $lebar){
			return $panjang*$lebar;
		}

	}

	$persegi = new Persegi("Kotak");
	echo "\n";
	echo $persegi->hitungLuas(10,5);
	echo $persegi->nama();