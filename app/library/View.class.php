<?php
	/**
	* 
	*/
	class View
	{
		private $title;
		private $css = array();
		private $js = array(),
		private $body;

		public function __construct(){
			# code...
		}

		public function page(){
			// $this->addCSS('css/main.css');
		}

		public function setTitle($title){
			$this->title = $title;
		}

		public function addCSS($cssPath){
			$this->css[] = $cssPath;
		}

		public function addJS($jsPath){
			$this->js[] = $jsPath;
		}

		public function startBody(){
			ob_start();
		}

		public function endBody(){
			$this->body = ob_get_clean();
		}

		public function render($content){
			ob_start();
			require_once $content;
			return ob_get_clean();
		}
	}