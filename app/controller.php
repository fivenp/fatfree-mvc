<?php

//! Base controller - Everything inside will be passed to the other controllers!
class Controller {

	// HTTP route pre-processor
	function beforeroute($f3,$args) {
		if($f3->get('ENV.DATABASE_URL')){
			$dbUrl = $this->__multiexplode(array('@',':','/'),$f3->get('ENV.DATABASE_URL'));
			$f3->set('db.dsn',"pgsql:host=".$dbUrl[5].";port=".$dbUrl[6].";dbname=".$dbUrl[7]);
			$f3->set('db.user',$dbUrl[3]);
			$f3->set('db.pass',$dbUrl[4]);
		}
		// $db = new \DB\SQL($f3->get('db.dsn'),$f3->get('db.user'),$f3->get('db.pass'));
		// $f3->set('DB',$db);
	}

	// HTTP route post-processor
	function afterroute($f3) {
		// Render appropriate layout
		if($f3->get('layout')=="empty"){
			echo View::instance()->render('layouts/empty.php');
		} else if($f3->get('AJAX')){
			echo View::instance()->render('layouts/default.json');
		} else {
			echo View::instance()->render('layouts/default.php');
		}
	}

	// Instantiate class
	function __construct() {
		$f3=Base::instance();
	}

	// Some tiny helper classes
	function __debug($d){
		print_r($d);
	}
	function __in_array_r($needle, $haystack, $strict = true) {
		foreach ($haystack as $item) {
			if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->__in_array_r($needle, $item, $strict))) {
				return true;
			}
		}
		return false;
	}
	function __set_cache($f3,$secs=0){
		if ($secs) {
				$time=microtime(TRUE);
				header_remove('Pragma');
				header('Expires: '.gmdate('r',$time+$secs));
				header('Cache-Control: public, max-age='.$secs);
				header('Last-Modified: '.gmdate('r'));
		} else {
			header('Cache-Control: no-cache, no-store, must-revalidate');
		}
	}
	function __multiexplode ($delimiters,$string) {
		$ready = str_replace($delimiters, $delimiters[0], $string);
		$launch = explode($delimiters[0], $ready);
		return  $launch;
	}
}
