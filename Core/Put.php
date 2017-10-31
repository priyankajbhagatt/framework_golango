<?php

class Put{

	public $put;
	
	public function __construct($params=array()){

		return $this->put = $this;
	}


	public function create_head($array_Elements=array()){

				$_returnHtml = '<html>';
				foreach($array_Elements as $Datatype=>$Url):

						if($Datatype == 'jscript'){

								if(is_array($Url)){

										foreach($Url as $Key=>$Src):

												$_returnHtml .= '<script type="text/javascript" src="'.BASEURL.'Creator/Lib/js/'.$Src.'"></script>';
												//echo $Src."\n";

										endforeach;	


								}


						}


				endforeach;	
				
				return $_returnHtml;

	}
	/*private function loadDatamodel(''){



	}*/


	


}
