<?php 

class Index extends Controller {

	/** 
	Index
	Just an EXAMPLE of how to do stuff
	**/

	function index($f3){
		$f3->set('title','');
		$f3->set('classname','index');
		$f3->set('template','views/index.php'); 
	}

}