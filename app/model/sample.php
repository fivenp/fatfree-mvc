<?php
namespace Model;

class Sample extends \DB\Cortex {
	protected
		$fieldConf = array(
			'samples' => array(
				'has-many' => array('\Model\SampleImages','images'),
			),
		),
		$db = 'DB',         // F3 hive key of a valid DB object
		$table = 'samples',
		// $fluid = true,      // triggers the SQL Fluid Mode, default: false
		$primary = 'id',   // name of the primary key (auto-created), default: id
		$ttl = 120,         // caching time of field schema, default: 60
		$rel_ttl = 30;      // caching time of all relations, default: 0
}