<?php

class First_Action extends Action{


	public function __construct($params=array()){

		return parent::__construct();

	}
	public function init(){

		$this->Template('Template',array('id'=>1));
	}	
	public function jayesh(){

		$Object = $this->grab->prepareDatamodel('Checkout');
		$return['checkout'] = $Object->Jay();
		$return['newdata'] = '1234556';

		$this->grab->Template('Template',$return);
		
	}


}