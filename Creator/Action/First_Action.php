<?php

class First_Action extends Action{


	public function __construct($params=array()){

		return parent::__construct();

	}
	public function init(){

		$this->Template('index',array('id'=>1));
	}	

}