<?php

require './enviroment.php';


global $config;
$config = array();
//define('BASE_URL', 'http://localhost/PortariaBandeirante');
define('BASE_URL', 'http://localhost/portal_');

if(ENVIROMENT == 'development'){
	$config['dbname'] = 'portariabandeirante';
    $config['dbhost'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}
else {
	 // $config para ambiente de produção
    $config['dbname'] = 'portariabandeirante';
    $config['dbhost'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'B@nd@)!@';
}
