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

		protected function layout($content, $data, $config){
			// $config = array(
			// 	'title' => array(
			// 		'main' => 'mainTitle',
			// 		'sub' => 'subTitle',
			// 	),
			// 	'css' => $css,
			// 	'js' => $js,
			// );

			// set data
			$this->page()->setData($data);

			// set title
			$this->page()->setTitle($config['title']['main'], $config['title']['sub']);

			// set css
			foreach($config['css'] as $value){
				$this->page()->addCSS($value);
			}

			// set js
			foreach($config['js'] as $value){
				$this->page()->addJS($value);
			}

			// set content
			$this->page()->setContent($content);
			$this->page()->render();
		}

		public function redirect($url){
			header("Location: ".$url);
		}
	}