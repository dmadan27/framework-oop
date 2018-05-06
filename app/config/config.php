<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");

	// config base url
	define('BASE_URL', 'http://localhost/framework-oop/'); // isi path dari web
	define('SITE_URL', BASE_URL.'index.php/'); // hilangkan index.php atau komentari SITE_URL jika sudah memakai .htaccess
	define('DEFAULT_CONTROLLER', 'home'); // default controller yg diakses pertama kali
	define('VERSION', '');

	// config database
	define('DB_HOST', ''); // host db
	define('DB_USERNAME', ''); // username db
	define('DB_PASSWORD', ''); // password db
	define('DB_NAME', ''); // db yang digunakan
