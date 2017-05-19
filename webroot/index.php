<?php
$f3=require('../lib/f3/base.php');
$f3->config('../config/settings.ini');
$f3->config('../config/routes.ini');
// $f3->set('CACHE',TRUE);
// new Session();

### CONFIG / ENVIRONMENT
$host = $_SERVER['HTTP_HOST'];
if(strpos($host, 'local.') !== false) {
	$f3->config('../config/config.local.ini');
} else {
	if (strpos($host, 'dev.') !== false) { 
		$f3->config('../config/config.dev.ini');	
	} else if (strpos($host, 'testing') !== false) { 
		$f3->config('../config/config.testing.ini');	
	} else if (strpos($host, 'staging') !== false) { 
		$f3->config('../config/config.staging.ini');	
	} else {
		$f3->config('../config/config.production.ini');	
	} 
}

################################################################################

$f3->run();
