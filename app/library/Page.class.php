<?php
	/**
	* 
	*/
	class Page{
		// public $viewName = NULL;
		private $title = array();
		private $header;
		private $sidebar;
		private $menuSidebar;
		private $content;
		private $footer;
		private $css = array();
		private $js = array();
		private $data;

		public function __construct(){
			// set css dan js
			// $this->addCSS('css/main.css');
			// $this->addJS('js/main.js');

			// $data = array(
			// 	array(
			// 		'nama' => 'Ujang Jeprut',
			// 		'umur' => 20,
			// 	),
			// 	array(
			// 		'nama' => 'Ujang Jeprut',
			// 		'umur' => 20,
			// 	),
			// 	array(
			// 		'nama' => 'Ujang Jeprut',
			// 		'umur' => 20,
			// 	),
			// 	array(
			// 		'nama' => 'Ujang Jeprut',
			// 		'umur' => 20,
			// 	),
			// 	array(
			// 		'nama' => 'Ujang Jeprut',
			// 		'umur' => 20,
			// 	),
			// );
			// $this->data = $data;

			// // set title dan content
			// $this->setTitle('Page Test', 'Ini Adalah Halaman Test');
			// $this->setContent('test/list');

			// $this->render();
		}

		// public function page(){
			
		// }

		public function setTitle($mainTitle, $subTitle){
			$this->title['main'] = $mainTitle;
			$this->title['sub'] = $subTitle;
		}

		public function setHeader(){
			ob_start();
			require_once ROOT.DS.'app'.DS.'views'.DS.'layout'.DS.'header.php';
			$this->header = ob_get_clean();
		}

		public function setSidebar(){
			ob_start();
			require_once ROOT.DS.'app'.DS.'views'.DS.'layout'.DS.'sidebar.php';
			$this->sidebar = ob_get_clean();
		}

		public function setContent($content){
			$temp = explode('/', $content);
			if (count($temp) > 1){
				$content = $temp[0].DS.$temp[1];
			}

			ob_start();
			require_once ROOT.DS.'app'.DS.'views'.DS.$content.'.php';
			$this->content = ob_get_clean();
		}

		public function setData($data){
			$this->data = $data;
		}

		public function setFooter(){
			ob_start();
			require_once ROOT.DS.'app'.DS.'views'.DS.'layout'.DS.'footer.php';
			$this->footer = ob_get_clean();
		}

		public function addCSS($cssPath){
			$this->css[] = $cssPath;
		}

		public function getCSS(){
			foreach ($this->css as $value) {
				echo '<link rel="stylesheet" href="'.BASE_URL.$value.'">'."\n";
			}
		}

		public function addJS($jsPath){
			$this->js[] = $jsPath;
		}

		public function getJS(){
			foreach ($this->js as $value) {
				echo '<script src="'.BASE_URL.$value.'"></script>'."\n";
			}
		}

		public function render(){
			$this->setHeader();
			$this->setSidebar();
			$this->setFooter();		
			require_once ROOT.DS.'app'.DS.'views'.DS.'layout.php';
		}

	}