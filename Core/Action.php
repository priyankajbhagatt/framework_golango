<?php

abstract class Action{

	public $grab;
	private $Template_Object;
	
	public function __construct($params=array()){
		
		return $this->grab = new Grab();
	}

	protected function execute_command($command,$params=array()){

		 return exec($command);

	}

	/*private function loadDatamodel(''){



	}*/


	


}