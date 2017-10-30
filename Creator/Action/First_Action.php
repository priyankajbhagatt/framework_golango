<?php

class First_Action extends Action{


	public function __construct($params=array()){

		return parent::__construct();

	}
	public function init(){

		$this->grab->Template('index',array('id'=>1));
	}	

	public function jaye(){

			$headerarray = array('jscript'=>array(
										"jquery.min.js","jquery.scrolly.min.js","skel.min.js","util.js","main.js"	
											),
								'style'=>array(

										"main.css"
									)			 

				);
			$this->put->create_head($headerarray);

	}

}