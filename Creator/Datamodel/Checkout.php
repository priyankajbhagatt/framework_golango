<?php

class Checkout extends Datamodel{


	public function __construct($params=array()){

		return parent::__construct();

	}
	
	public function Jay(){

		$Query = "SELECT * FROM tbl_user_data WHERE u_id=:id";
		$Array = array(':id'=>3);
		
		return $this->exec_query($Query,$Array);

	}

}