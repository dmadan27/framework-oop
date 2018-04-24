<?php
	/**
	* 
	*/
	class Mobil{
		public $merk = 'Toyota';
		public $tipe = 'Fortuner';
		public $tahun = '2018';
		public $warna = 'Putih';

		// method maju
		public function maju(){
			// echo "Ngennngggg....";
			return "Ngennngggg....";
		}
	}

	$mobil = new Mobil();
	
	// set nilai property
	// $mobil->merk = 'Honda';
	// $mobil->tipe = 'CR-V';
	// $mobil->tahun = '2006';
	// $mobil->warna = 'Silver';

	// cetak nilai property
	// echo "Mobil $mobil->merk \n";
	// echo "Model $mobil->tipe \n";
	// echo "Tahun $mobil->tahun \n";
	// echo "Warna $mobil->warna \n";

	// run method maju()
	// $mobil->maju();

	$mobil_2 = new Mobil();

	// mobil 1
	$mobil->merk = 'Honda';
	$mobil->tipe = 'CR-V';
	$mobil->tahun = '2006';
	$mobil->warna = 'Silver';

	echo $mobil->merk." ".$mobil->tipe." ".$mobil->maju();
	echo "\n";

	// mobil 2
	$mobil_2->merk = 'Mitsubishi';
	$mobil_2->tipe = 'Kuda';
	$mobil_2->tahun = '2000';
	$mobil_2->warna = 'Hitam';

	echo $mobil_2->merk." ".$mobil_2->tipe." ".$mobil_2->maju();