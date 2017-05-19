<?php 

class API extends Controller {

	function afterroute($f3) {
		echo View::instance()->render('layouts/default.json');
	}

	function sampleGet($f3){
		$f3->set('data',array('return'=>'sample'));
	}

}