<?php
	/**
	* Class Controller, Parent Class
	* Method Method Utama
	*/
	class Controller{
		
		public function __construct(){
			
		}

		protected function page(){
			$view = new Page();
			return $view;
		}

		protected function model($modelName){
			require_once ROOT.DS.'app'.DS.'models'.DS.ucfirst($modelName).'.php';
			$class = ucfirst($modelName);
			$this->$modelName = new $class();
		}

		protected function layout($content, $config, $data = null){
			$view = $this->page();

			// set data
			$view->setData($data);

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

			// set content
			$view->setContent($content);

			// get layout
			$view->render();
		}

		public function redirect($url){
			header("Location: ".$url);
		}
	}