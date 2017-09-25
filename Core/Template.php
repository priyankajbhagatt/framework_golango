<?php
class Template{

	public function __construct(){

			return 'This class is belongs to view ';


	}

	public function openTemplate($Template,$Data=array()){

		return $this->createTemplate($Template,$Data);

	}

	protected function createTemplate($Template,$Data=array()){

		if(file_exists(__DIR_PATH__.'/Creator/Template/'.$Template.'.php')){
				
				$this->_requie_file_template(__DIR_PATH__.'/Creator/Template/'.$Template.'.php',$Data);
				

		}

	}

	private function _requie_file_template($Templatefile,$Dataset){

		try {
			if(isset($Dataset) && !empty($Dataset)){
				foreach($Dataset as $Key=>$Data):
					
						${$Key} = $Dataset[$Key]; 
		
			    endforeach;
		    }
		    require_once($Templatefile);

		} catch (ErrorException $ex) {

		    die('Template Not Found');
		    
		}

	}


}