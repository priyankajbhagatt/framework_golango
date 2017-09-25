<?php
/******************************************************************
Project : Framework Golango
Author: Jayesh
Language: PHP 7,Angular,React
Description:

This framework is currently under development 
and licesnse under Wide Colors Developer
Do not modify anything before reading documents
Do not change core classes
Idea behind building this framework is to not 
to look for jquery angular and UI related scenario
this framework have support for angular js , react js , jquery
less, css and have builtin methods like ajax validation , datepicker,
modal etc 
Future is to give support for Python with php as well

Nothing Like Anything 
*********************************************************************/
define('__DIR_PATH__',dirname(__FILE__));



if(file_exists(__DIR_PATH__.'/Creator/Settings/Setting.php')){

	require_once(__DIR_PATH__.'/Creator/Settings/Setting.php');

}else{

	die('Setting Should Be There');

}

if($Setting['environment'] == 'development'){

	error_reporting(E_ALL);

}else if($Setting['environment'] == 'live'){

	error_reporting(0);

}

$UrlExplode = explode('/',$_SERVER['PHP_SELF']);


################################################
# Include all require core class files which are
# all abstract class
#################################################
include_once('Core/Action.php');
include_once('Core/Template.php');	
include_once('Core/Datamodel.php');
################################################
# Get class name and method name
################################################
if(!empty($_GET['class']) && !empty($_GET['method'])){

	$class = $_GET['class'];
	$method = $_GET['method'];

}
if(isset($UrlExplode[3]) && !empty($UrlExplode[3])){
	$class = $UrlExplode[3];
}
if(isset($UrlExplode[4]) && !empty($UrlExplode[4])){
	$method = $UrlExplode[4];
}
################################################
# Remove/Unset Method and class from query string
################################################
unset($_GET['method']);
unset($_GET['class']);
################################################
# Check User Defined Controller file is exist or not 
################################################
if(isset($class) && !empty($class)){
	if(preg_match('#.php#ims',$class) || $class == NULL){

		$class = $Setting['default_action'];
	}
}else{

		$class = $Setting['default_action'];

}
if(isset($method) && !empty($method)){
	if($method == NULL && $method == ''){
		
		$method = $Setting['default_action_method'];
	}
}else{

		$method = $Setting['default_action_method'];
}

if(file_exists(__DIR_PATH__.'/Creator/Action/'.$class.'.php')){
	
	require_once(__DIR_PATH__.'/Creator/Action/'.$class.'.php');
	$Object = new $class();
	if(isset($method) && $method != ''){
		if(method_exists ($Object,$method)){
			$Object->$method($_GET);
		}else{

			echo 'Method Not Exists';
		}	
		
	}

}else{

	echo 'Sorry Controller Not Found';

}




