<?php 

class Rake extends Controller {

	/** 
	RAKE
	This is intendet to be run either from CMD line or for initial tasks!
	**/

	function task1($f3){
		$db = new \DB\SQL($f3->get('db.dsn'),$f3->get('db.user'),$f3->get('db.pass'));

		$samples = new \DB\Cortex($db, 'samples');
		$samples = $samples->find(array('test = ? AND status = ?','test',1),array('order'=>'id ASC'));

		foreach($samples as $sample){
			// Do your stuff
		}

		$f3->set('layout','empty');
		$f3->set('template','empty.php');

	}

}