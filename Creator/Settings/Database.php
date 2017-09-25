<?php
/*************************************************************************
Project : Framework Golango
Author: Jayesh
Language: PHP 7,Angular,React
Description: 
This is database configuration file over here you can define database 
configuration for environment live/development database $Datamodelconfig
define key and pass array to define new database you can define more than 1 
database configuration in one project please read Datamodel documentation 
to get more about how to work with more than single database 

*************************************************************************/
class Database_Config{


	function Setup_Config(){


		return $Datamodelconfig = array(
						'development'=> array(

								'host'=>'localhost',
								'username'=>'root',	
								'password'=>'1234',
								'database'=>'moneytrix',		
						),
						'live'=>array(

								'host'=>'localhost',
								'username'=>'root',	
								'password'=>'root',
								'database'=>'python',	
						)
		);

	}
	

}
