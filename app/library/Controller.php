<?php
	/**
	* 
	*/
	class Controller{
		
		public function __construct(){
			
		}

		protected function view($viewName){
			$view = new View($viewName)
		}

		protected function model($modelName){
			require_once ROOT.DS.'app'.DS.'models'.DS.ucfirst($modelName).'Model.php';
			$class = ucfirst($modelName);
			$this->$modelName = new $class();
		}

		protected function layout(){
			
		}

		protected function back(){

		}

		protected function redirect(){

		}

		protected function validate(){

		}
	}