<?php
	Defined("BASE_PATH") or die("Dilarang Mengakses File Secara Langsung");
	
	/**
	 * Class Controller
	 * Library yang berperan sebagai Parent Class untuk Controller
	 */
	class Controller{

		/**
		 * Method model
		 * Proses load model tertentu
		 * @param modelName {string} model yang ingin di load
		 */
		final protected function model($modelName){
			require_once ROOT.DS.'app'.DS.'models'.DS.ucfirst($modelName).'.php';
			$class = ucfirst($modelName);
			$this->$modelName = new $class();
		}

		/**
		 * Method page
		 * Proses load library Page.class.php
		 * @return view {object} object class
		 */
		final protected function page(){
			$view = new Page();
			return $view;
		}

		/**
		 * Method auth
		 * Proses load library Auth.class.php
		 * @param auth {string} set default 'auth'
		 */
		final protected function auth($auth = 'auth'){
			$this->$auth = new Auth();
		}

		/**
		 * Method helper
		 * Proses load library Helper.class.php
		 * @param helper {string} set default 'helper'
		 */
		final protected function helper($helper = 'helper'){
			$this->$helper = new Helper();
		}

		/**
		 * Method validation
		 * Proses load library Validation.class.php
		 */
		final protected function validation($validation = 'validation'){
			$this->$validation = new Validation();
		}

		/**
		 * Method layout
		 * Proses render content, data, configurasi css, dan js kedalam layout yang sudah di set
		 * @param content {string} halaman/content yang ingin dipasang di layout
		 * @param config {array} default null, configurasi penambahan css dan js custom di dalam layout
		 * 	$config = array (
		 * 		'title' => array (
		 * 			'main' => '...',
		 * 			'sub' => '...'
		 * 		),
		 * 		'css' => array(),
		 * 		'js' => array()
		 * 	);
		 * @param data {any} default null
		 */
		final protected function layout($content, $config = null, $data = null){
			$view = $this->page();

			// set data
			if($data != null) $view->setData($data);

			if($config != null){
				// set title
				$view->setTitle($config['title']['main'], $config['title']['sub']);

				// set css
				foreach($config['css'] as $value){
					$view->addCSS($value);
				}

				// set js
				foreach($config['js'] as $value){
					$view->addJS($value);
				}
			}

			// set content
			$view->setContent($content);

			// set menu sidebar
			$view->setMenuSidebar();

			// get layout
			$view->render();
		}

		/**
		 * Method view
		 * Proses render view/page secara langsung tanpa layouting
		 * Support mengakses beberapa sub folder
		 * @param view {string}
		 */
		final protected function view($view){
			$temp = explode('/', $view);
			
			$newView = '';
			for($i=0; $i<count($temp); $i++){
				if((count($temp)-$i!=1)) $newView .= $temp[$i].DS;
				else $newView .= $temp[$i];
			}
			
			require_once ROOT.DS.'app'.DS.'views'.DS.$newView.'.php';
			die();
		}

		/**
		 * Method redirect
		 * Proses redirect ke halaman tertentu
		 * @param url {string} default BASE_URL
		 */
		final public function redirect($url = BASE_URL){
			header("Location: ".$url);
			die();
		}
	}