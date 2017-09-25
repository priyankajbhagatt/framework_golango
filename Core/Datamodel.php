<?php

class Datamodel{

	private $user;
	private $password;
	private $host;
	private $databasename;
	private $connection;
	private $return_result = array();
	private $Object_Database_Setting;
	private $database_config_name = 'Database';
	/****************************************************************
	 Contructor handling part of connection and createsconnection object
	*****************************************************************/
	public function __construct(){
		
		$this->database_connection();
	
	}
	/*****************************************************
	 exec_query to check all paramters are exist or not if exists prepare function will executes
	 Do not modify anything	
	******************************************************/
	public function exec_query($Query='',$Parameters='',$Option=array()){
	
		if(!empty($Query) && $Query != '' && !empty($Parameters) && $Parameters != ''){

			return $this->prepare($Query,$Parameters,$Option);
		}else{

			$return_result['response'] = 'Missing Paramters! Please Read Docs';
			$return_result['err_code'] = 1;
			return $return_result;	
		}

	}
	
	protected function database_connection($databaseconfigname=''){

			if(file_exists(__DIR_PATH__.'/Creator/Settings/'.$this->database_config_name.'.php')){

					$this->_requie_file_datamodel_config(__DIR_PATH__.'/Creator/Settings/'.$this->database_config_name.'.php');
					$Object_Database = new Database_Config();
					
					if(null !== $Object_Database->Setup_Config() && !empty($Object_Database->Setup_Config())){
							$this->Object_Database_Setting = $Object_Database->Setup_Config();
							try 
					    		{
									$this->connection = new PDO('mysql:host='.$this->Object_Database_Setting['development']['host'].';dbname='.$this->Object_Database_Setting['development']['database'].'',''.$this->Object_Database_Setting['development']['username'].'',
							                      ''.$this->Object_Database_Setting['development']['password'].'');   
									$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								}catch(PDOException $ex){

									echo $ex->getMessage();
								}
					}
			}else{

					die('Database setting file is missing');

			}

	}
	/*****************************************************
	 prepare function private to execute query 
	 Do not modify anything	
	******************************************************/	
	private function prepare($Query,$Parameters,$Option){
		    try 
		    {		
			 if(!empty($Query) && $Query != ''){

			    $Query_Object = $this->connection->prepare($Query);
			    if($Query_Object->execute($Parameters)){
	
				if(preg_match('#^SELECT#ims',$Query)){
				
					while ($ResultSet = $Query_Object->fetchAll()){

					    $Result_Object['response'][] = $ResultSet;
				    	}
			    	}else{
					$Result_Object['response'] = 'Success';
				}
	
				if(isset($Option['lastid'])){
				
					$Result_Object['last_insert_id'] = $this->connection->lastInsertId();
			    	
			    }	
				$Result_Object['err_code'] = 0;	
			    
			    }else{
				$Result_Object['err_code'] = 1;	
				$Result_Object['response'] = 'Database Operation Failed';
			    }	
			    
			 } 
			 //$this->_database_close_connection();

			 return $Result_Object; 
  
		    }
		    catch(PDOException $ex)
		    {

				if(isset($Option['error_log']) && $Option['error_log'] == true){
					echo $ex->getMessage();
				}
					
		    }

	}

	private function _requie_file_datamodel_config($Datamodelconfig){

		try {
		    
		    require_once($Datamodelconfig);

		} catch (ErrorException $ex) {

		    die('Configuration Setting Not Found');
		    
		}

	}

	private function _database_close_connection(){


		$this->connection = null;

	}



}