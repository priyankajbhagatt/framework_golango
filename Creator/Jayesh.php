<?php

class Jayesh extends Action{


	public function __construct($params=array()){

		return parent::__construct();

	}
	public function init(){

		$this->openTemplate('',array());
	}	

	public function What(){

			echo 'Hello world';

	}


}