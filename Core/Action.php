<?php

abstract class Action{

	public $grab;
	private $Template_Object;
	public function __construct($params=array()){

		$this->grab = $this;
	}

	protected function Template($Template,$Data=array()){

		return $this->createTemplate($Template,$Data);

	}

	private function createTemplate($Template,$Data=array()){
	
		if(!empty($Template) && NULL != $Template){

			$this->Template_Object = new Template();
			$this->Template_Object->openTemplate($Template,$Data);

		}


	}

	public function prepareDatamodel($Datamodel){

			if(!empty($Datamodel) && NULL != $Datamodel){

					if(file_exists(__DIR_PATH__.'/Creator/Datamodel/'.$Datamodel.'.php')){

						$this->_requie_file_model(__DIR_PATH__.'/Creator/Datamodel/'.$Datamodel.'.php');


						return $Datamodel_Object = new $Datamodel();
						

					}else if(file_exists(__DIR_PATH__.'/Core/Datamodel/'.$Datamodel.'.php')){

						$this->_requie_file_model(__DIR_PATH__.'/Core/Datamodel/'.$Datamodel.'.php');

					}else{

						die('Datamodel Not Found');
					}

			}	


	}


	private function _requie_file_model($Datamodelnamepath){

		try {
		    
		    require_once($Datamodelnamepath);

		} catch (ErrorException $ex) {

		    die('Datamodel Not Found');
		    
		}

	}

	/*private function loadDatamodel(''){



	}*/


	


}