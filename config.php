<?php

require './enviroment.php';


global $config;
$config = array();
//define('BASE_URL', 'http://localhost/portal_');
define('BASE_URL', 'http://192.168.1.131/portal_');
//define('BASE_URL', 'http://192.168.1.15:8087');
if(ENVIROMENT == 'development'){
	$config['dbname'] = 'portariabandeirante_new';
    $config['dbhost'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}
else {
	 // $config para ambiente de produção
    $config['dbname'] = 'portariabandeirante_new';
    $config['dbhost'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'B@nd@)!@';
}
